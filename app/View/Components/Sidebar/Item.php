<?php

namespace App\View\Components\Sidebar;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public function __construct(
        public Event $event,
        public bool $selected = false,
    ) {
        //
    }

    public function render(): View
    {
        return view('components.sidebar.item');
    }
}
