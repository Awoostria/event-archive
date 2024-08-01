<?php

namespace App\Models;

use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model implements HasMedia
{
    /** @use HasFactory<EventFactory> */
    use HasFactory;

    use HasSlug;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'location',
        'total_attendees',
        'total_sponsors',
        'total_super_sponsors',
        'theme_color',
    ];

    /**
     * @return array{
     *     start_date: 'date',
     *     end_date: 'date',
     *     total_attendees: 'integer',
     *     total_sponsors: 'integer',
     *     total_super_sponsors: 'integer',
     * }
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'total_attendees' => 'integer',
            'total_sponsors' => 'integer',
            'total_super_sponsors' => 'integer',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo')
            ->singleFile();
    }

    public function getLogo(): ?Media
    {
        return $this->getFirstMedia('logo');
    }

    /**
     * @return HasMany<EventResource>
     */
    public function resources(): HasMany
    {
        return $this->hasMany(EventResource::class);
    }
}
