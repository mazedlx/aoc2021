<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day10 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day10_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day10_2.txt');

        $this->solutionOne = 367227;
        $this->solutionTwo = 3583341858;
    }

    public function render()
    {
        return view('livewire.day10');
    }
}
