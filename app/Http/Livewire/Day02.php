<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day02 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day02_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day02_2.txt');

        $this->solutionOne = 1938402;
        $this->solutionTwo = 1947878632;
    }

    public function render()
    {
        return view('livewire.day02');
    }
}
