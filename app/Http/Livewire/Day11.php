<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day11 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day11_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day11_2.txt');

        $this->solutionOne = 1747;
        $this->solutionTwo = 505;
    }

    public function render()
    {
        return view('livewire.day11');
    }
}
