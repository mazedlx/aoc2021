<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day05 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day05_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day05_2.txt');

        $this->solutionOne = 8060;
        $this->solutionTwo = 21577;
    }

    public function render()
    {
        return view('livewire.day05');
    }
}
