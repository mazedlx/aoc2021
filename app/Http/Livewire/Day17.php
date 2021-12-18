<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day17 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day17_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day17_2.txt');

        $this->solutionOne = 10011;
        $this->solutionTwo = 2994;
    }

    public function render()
    {
        return view('livewire.day17');
    }
}
