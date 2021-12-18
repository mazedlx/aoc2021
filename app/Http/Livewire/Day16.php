<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day16 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day16_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day16_2.txt');

        $this->solutionOne = 996;
        $this->solutionTwo = 96257984154;
    }

    public function render()
    {
        return view('livewire.day16');
    }
}
