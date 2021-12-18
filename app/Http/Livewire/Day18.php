<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day18 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day18_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day18_2.txt');

        $this->solutionOne = 3691;
        $this->solutionTwo = 4756;
    }

    public function render()
    {
        return view('livewire.day18');
    }
}
