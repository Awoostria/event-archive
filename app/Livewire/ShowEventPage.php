<?php

namespace App\Livewire;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

/**
 * @property-read Event $event
 * @property-read ?Event $previousEvent
 * @property-read Collection<int|string, Collection<int|string, EventResource>> $resourceTypes
 */
class ShowEventPage extends BasePageComponent
{
    #[Locked]
    public string $eventSlug;

    #[Computed]
    public function event(): Event
    {
        return Event::query()
            ->where('slug', $this->eventSlug)
            ->firstOrFail();
    }

    #[Computed]
    public function previousEvent(): ?Event
    {
        return Event::query()
            ->where('start_date', '<', $this->event->start_date)
            ->orderBy('start_date', 'desc')
            ->first();
    }

    /**
     * @return Collection<int|string, EloquentCollection<int|string, \App\Models\EventResource>>
     */
    #[Computed]
    public function resourceTypes(): Collection
    {
        return $this->event->resources
            ->groupBy('type');
    }

    public function mount(): void
    {
        $this->setSeoData();
    }

    public function render(): View
    {
        return view('livewire.show-event-page');
    }

    protected function setSeoData(): void
    {
        SEOTools::setTitle($this->event->name);
    }
}
