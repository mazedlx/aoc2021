<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day08 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day08_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day08_2.txt');

        $this->solutionOne = 245;
        $this->solutionTwo = 983026;
    }

    public function render()
    {
        return view('livewire.day08');
    }
}
