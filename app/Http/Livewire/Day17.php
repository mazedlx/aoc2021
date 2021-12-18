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
        $this->codeOne = Storage::disk('files')->get('day07_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day07_2.txt');

        $this->solutionOne = 352707;
        $this->solutionTwo = 95519693;
    }

    public function render()
    {
        return view('livewire.day17');
    }
}
