<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day15 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day15_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day15_2.txt');

        $this->solutionOne = 811;
        $this->solutionTwo = 3012;
    }

    public function render()
    {
        return view('livewire.day15');
    }
}
