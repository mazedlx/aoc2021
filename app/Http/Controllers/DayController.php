<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class DayController extends Controller
{
    public function __invoke($day)
    {
        $class = 'App\Http\Livewire\Day' . Str::padLeft($day, 2, '0');

        if (! class_exists($class)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return (new $class)->render();
    }
}
