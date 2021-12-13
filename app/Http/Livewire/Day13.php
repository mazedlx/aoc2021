<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day13 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->codeOne = Storage::disk('files')->get('day13_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day13_2.txt');

        $this->solutionOne = 729;
        $this->solutionTwo = '###&nbsp;&nbsp;&nbsp;##&nbsp;&nbsp;####&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;###&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;####&nbsp;###&nbsp;&nbsp;<br>
        #&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;<br>
        #&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;###&nbsp;&nbsp;####&nbsp;###&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;<br>
        ###&nbsp;&nbsp;#&nbsp;##&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;###&nbsp;&nbsp;<br>
        #&nbsp;#&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;<br>
        #&nbsp;&nbsp;#&nbsp;&nbsp;###&nbsp;####&nbsp;####&nbsp;###&nbsp;&nbsp;#&nbsp;&nbsp;#&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;<br>';
    }

    public function render()
    {
        return view('livewire.day13');
    }
}
