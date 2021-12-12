<?php

use App\Http\Livewire\Day01;
use App\Http\Livewire\Day02;
use App\Http\Livewire\Day03;
use App\Http\Livewire\Day04;
use App\Http\Livewire\Day05;
use App\Http\Livewire\Day06;
use App\Http\Livewire\Day07;
use App\Http\Livewire\Day08;
use App\Http\Livewire\Day09;
use App\Http\Livewire\Day10;
use App\Http\Livewire\Day11;
use App\Http\Livewire\Day12;
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
Route::get('days/8', Day08::class);
Route::get('days/9', Day09::class);
Route::get('days/10', Day10::class);
Route::get('days/11', Day11::class);
Route::get('days/12', Day12::class);
