<?php

use App\Http\Livewire\ShowCalendar;
use App\Http\Livewire\ShowDay;
use Illuminate\Support\Facades\Route;

Route::get('/', ShowCalendar::class)->name('home');

//Route::get('days/{day}', DayController::class)->name('days.show');
