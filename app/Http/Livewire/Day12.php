<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day12 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day12_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day12_2.txt');

        $this->solutionOne = 3410;
        $this->solutionTwo = 98796;
    }

    public function render()
    {
        return view('livewire.day12');
    }
}
