<?php

use App\Http\Controllers\DayController;
use App\Http\Livewire\ShowCalendar;
use Illuminate\Support\Facades\Route;

Route::get('/', ShowCalendar::class)->name('home');

Route::get('days/{day}', DayController::class)->name('days.show');
