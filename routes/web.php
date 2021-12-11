<?php

use App\Http\Livewire\Day01;
use App\Http\Livewire\Day02;
use App\Http\Livewire\ShowCalendar;
use Illuminate\Support\Facades\Route;

Route::get('/', ShowCalendar::class)->name('home');

Route::get('days/1', Day01::class);
Route::get('days/2', Day02::class);
