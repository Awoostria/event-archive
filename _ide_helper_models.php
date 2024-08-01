<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property string $location
 * @property int $total_attendees
 * @property int|null $total_sponsors
 * @property int|null $total_super_sponsors
 * @property string $theme_color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventResource> $resources
 * @property-read int|null $resources_count
 * @method static \Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereThemeColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTotalAttendees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTotalSponsors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTotalSuperSponsors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 */
	class Event extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $event_id
 * @property int $order_column
 * @property \App\Enums\EventResourceType $type
 * @property string|null $label
 * @property string $url
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read string $fancy_url
 * @method static \Database\Factories\EventResourceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventResource whereUrl($value)
 */
	class EventResource extends \Eloquent implements \Spatie\EloquentSortable\Sortable {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

