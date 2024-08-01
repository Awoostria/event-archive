<?php

namespace App\Models;

use App\Enums\EventResourceType;
use App\Models\Scopes\OrderedScope;
use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

#[ScopedBy(OrderedScope::class)]
class EventResource extends Model implements Sortable
{
    /** @use HasFactory<EventFactory> */
    use HasFactory;

    use SortableTrait;

    protected static function booted(): void
    {
        static::saving(function (EventResource $eventResource): void {
            if ($eventResource->file) {
                $eventResource->url = Storage::disk(config('filament.default_filesystem_disk'))
                    ->url($eventResource->file);
            }
        });
    }

    protected $fillable = [
        'event_id',
        'order_column',
        'type',
        'label',
        'url',
        'file',
    ];

    /**
     * @return array{
     *     order_column: 'integer',
     *     type: 'App\Enums\EventResourceType',
     * }
     */
    protected function casts(): array
    {
        return [
            'order_column' => 'integer',
            'type' => EventResourceType::class,
        ];
    }

    /**
     * @var array<string, string|bool>
     */
    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    /**
     * @return Builder<EventResource>
     */
    public function buildSortQuery(): Builder
    {
        return static::query()->where('event_id', $this->event_id);
    }

    /**
     * @return BelongsTo<Event, EventResource>
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * @return Attribute<string|null, null>
     */
    protected function label(): Attribute
    {
        return Attribute::make(
            get: function (?string $value): ?string {
                return match ($this->type) {
                    EventResourceType::Website => $this->fancy_url,
                    EventResourceType::Conbook => 'Click here to view the conbook',
                    default => $value
                };
            },
        );
    }

    protected function getFancyUrlAttribute(): string
    {
        $url = str_replace(['http://', 'https://', 'www.'], '', $this->url);

        if (Str::endsWith($url, '/')) {
            $url = substr($url, 0, -1);
        }

        return $url;
    }
}
