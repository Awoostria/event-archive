<?php

namespace App\Livewire;

use Livewire\Component;

abstract class BasePageComponent extends Component
{
    abstract protected function setSeoData(): void;
}
