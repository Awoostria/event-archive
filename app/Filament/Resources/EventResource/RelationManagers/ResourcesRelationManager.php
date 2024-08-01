<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Enums\EventResourceType;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ResourcesRelationManager extends RelationManager
{
    protected static string $relationship = 'resources';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options(EventResourceType::class)
                    ->searchable()
                    ->required()
                    ->live(),

                Forms\Components\TextInput::make('label')
                    ->visible(fn (Forms\Get $get) => EventResourceType::tryFrom($get('type'))?->canHaveLabel() ?? false)
                    ->string()
                    ->maxLength(255)
                    ->required(fn (Forms\Get $get) => EventResourceType::tryFrom($get('type'))?->canHaveLabel() ?? false),

                Forms\Components\TextInput::make('url')
                    ->visible(fn (Forms\Get $get) => EventResourceType::tryFrom($get('type'))?->canHaveUrl() ?? false)
                    ->label('URL')
                    ->url()
                    ->string()
                    ->maxLength(255)
                    ->startsWith('https://')
                    ->required(),

                Forms\Components\FileUpload::make('file')
                    ->visible(fn (Forms\Get $get) => EventResourceType::tryFrom($get('type'))?->canHaveFile() ?? false)
                    ->directory(function () {
                        /** @var Event $event */
                        $event = $this->getOwnerRecord();

                        return "events/$event->slug";
                    }),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('type')
            ->reorderable('order_column')
            ->defaultSort('order_column')
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('label')
                    ->searchable(),

                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
