<?php

use App\Livewire\ShowEventPage;
use App\Livewire\ShowHomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', ShowHomePage::class)
    ->name('home');

Route::get('{eventSlug}', ShowEventPage::class)
    ->name('event');
