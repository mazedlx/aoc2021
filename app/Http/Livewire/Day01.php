<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day01 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = Storage::disk('files')->get('input01.txt');
        $this->codeOne = Storage::disk('files')->get('day01_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day01_2.txt');
        $numbers = collect(explode(\PHP_EOL, $this->input))
        ->map(fn ($number) => (int) $number);
        $increased = 0;
        for ($i = 1; $i < \count($numbers); $i++) {
            if ($numbers[$i] > $numbers[$i - 1]) {
                $increased++;
            }
        }

        $this->solutionOne = $increased;

        $increased = 0;
        for ($i = 0; $i < \count($numbers) - 3; $i++) {
            $windowA = $numbers[$i] + $numbers[$i + 1] + $numbers[$i + 2];
            $windowB = $numbers[$i + 1] + $numbers[$i + 2] + $numbers[$i + 3];

            if ($windowB > $windowA) {
                $increased++;
            }
        }

        $this->solutionTwo = $increased;
    }

    public function render()
    {
        return view('livewire.day01');
    }
}
