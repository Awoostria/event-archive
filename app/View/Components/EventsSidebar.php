<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class EventsSidebar extends Component
{
    /**
     * @var Collection<int, Event>
     */
    public Collection $events;

    public function __construct(
        public ?Event $selectedEvent = null,
    ) {
        $this->events = Event::query()
            ->orderBy('start_date', 'desc')
            ->get();
    }

    public function render(): View
    {
        return view('components.events-sidebar');
    }
}
