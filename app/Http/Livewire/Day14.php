<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day14 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day14_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day14_2.txt');

        $this->solutionOne = '3906';
        $this->solutionTwo = '4441317262452';
    }

    public function render()
    {
        return view('livewire.day14');
    }
}
