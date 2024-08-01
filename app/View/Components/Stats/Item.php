<?php

namespace App\View\Components\Stats;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public ?int $percentage = null;

    public function __construct(
        public string $title,
        public int $value,
        public ?int $previousValue = null,
    ) {
        $this->percentage = $this->previousValue && $this->previousValue < $this->value
            ? (int) ceil(round((($this->value - $this->previousValue) / $this->previousValue) * 100))
            : null;
    }

    public function render(): View
    {
        return view('components.stats.item');
    }
}
