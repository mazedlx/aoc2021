<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day01 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day01_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day01_2.txt');
        $this->solutionOne = 1482;
        $this->solutionTwo = 1518;
    }

    public function render()
    {
        return view('livewire.day01');
    }
}
