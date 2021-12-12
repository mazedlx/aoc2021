<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day04 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day04_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day04_2.txt');

        $this->solutionOne = 67716;
        $this->solutionTwo = 1830;
    }

    public function render()
    {
        return view('livewire.day04');
    }
}
