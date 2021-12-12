<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day06 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day06_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day06_2.txt');

        $this->solutionOne = 396210;
        $this->solutionTwo = 1770823541496;
    }

    public function render()
    {
        return view('livewire.day06');
    }
}
