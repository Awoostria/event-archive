<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum EventResourceType: string implements HasIcon, HasLabel
{
    case Website = 'website';
    case Conbook = 'conbook';
    case Photo = 'photo';
    case Video = 'video';
    case Other = 'other';

    public function getIcon(): string
    {
        return match ($this) {
            self::Website => 'heroicon-o-globe-alt',
            self::Conbook => 'heroicon-o-book-open',
            self::Photo => 'heroicon-o-photo',
            self::Video => 'heroicon-o-film',
            self::Other => 'heroicon-o-document',
        };
    }

    public function getLabel(bool $plural = false): string
    {
        $label = match ($this) {
            self::Website => 'Website',
            self::Conbook => 'Conbook',
            self::Photo => 'Photo',
            self::Video => 'Video',
            self::Other => 'Other',
        };

        return $plural ? Str::plural($label) : $label;
    }

    public function canHaveLabel(): bool
    {
        return match ($this) {
            self::Website, self::Conbook => false,
            self::Photo, self::Video, self::Other => true,
        };
    }

    public function canHaveFile(): bool
    {
        return match ($this) {
            self::Website => false,
            self::Conbook, self::Photo, self::Video, self::Other => true,
        };
    }

    public function canHaveUrl(): bool
    {
        return match ($this) {
            self::Website => true,
            self::Conbook, self::Photo, self::Video, self::Other => false,
        };
    }
}
