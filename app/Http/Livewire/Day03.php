<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day03 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day03_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day03_2.txt');

        $this->solutionOne = 4139586;
        $this->solutionTwo = 1800151;
    }

    public function render()
    {
        return view('livewire.day03');
    }
}
