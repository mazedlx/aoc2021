<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day09 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day09_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day09_2.txt');

        $this->solutionOne = 522;
        $this->solutionTwo = 916688;
    }

    public function render()
    {
        return view('livewire.day09');
    }
}
