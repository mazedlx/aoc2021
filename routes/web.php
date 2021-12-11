<?php

use App\Http\Livewire\Day01;
use App\Http\Livewire\Day02;
use App\Http\Livewire\Day03;
use App\Http\Livewire\Day04;
use App\Http\Livewire\Day05;
use App\Http\Livewire\Day06;
use App\Http\Livewire\Day07;
use App\Http\Livewire\ShowCalendar;
use Illuminate\Support\Facades\Route;

Route::get('/', ShowCalendar::class)->name('home');

Route::get('days/1', Day01::class);
Route::get('days/2', Day02::class);
Route::get('days/3', Day03::class);
Route::get('days/4', Day04::class);
Route::get('days/5', Day05::class);
Route::get('days/6', Day06::class);
Route::get('days/7', Day07::class);
