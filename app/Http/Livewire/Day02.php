<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day02 extends Component
{
    public $input;
    public $partOne;
    public $partTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = Storage::disk('files')->get('input02.txt');
        $this->codeOne = Storage::disk('files')->get('day02_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day02_2.txt');
        $x = 0;
        $y = 0;

        foreach (explode(\PHP_EOL, $this->input) as $inst) {
            [$direction, $value] = preg_split('/\s/', $inst);

            if ('forward' === $direction) {
                $x += $value;
            } elseif ('up' === $direction) {
                $y -= $value;
            } elseif ('down' === $direction) {
                $y += $value;
            }
        }

        $this->partOne = $x * $y;

        $x = 0;
        $y = 0;
        $aim = 0;

        foreach (explode(\PHP_EOL, $this->input) as $inst) {
            [$direction, $value] = preg_split('/\s/', $inst);

            if ('forward' === $direction) {
                $x += $value;
                $y += $aim * $value;
            } elseif ('up' === $direction) {
                $aim -= $value;
            } elseif ('down' === $direction) {
                $aim += $value;
            }
        }

        $this->partTwo = $x * $y;
    }

    public function render()
    {
        return view('livewire.day02');
    }
}
