<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day01 extends Component
{
    public $input;
    public $partOne;
    public $partTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = Storage::disk('public')->get('input01.txt');
        $this->codeOne = Storage::disk('public')->get('day01_1.txt');
        $this->codeTwo = Storage::disk('public')->get('day01_2.txt');
    }

    public function render()
    {
        $numbers = collect(explode(\PHP_EOL, $this->input))
            ->map(fn ($number) => (int) $number);
        $increased = 0;
        for ($i = 1; $i < \count($numbers); $i++) {
            if ($numbers[$i] > $numbers[$i - 1]) {
                $increased++;
            }
        }

        $this->partOne = $increased;

        $increased = 0;
        for ($i = 0; $i < \count($numbers) - 3; $i++) {
            $windowA = $numbers[$i] + $numbers[$i + 1] + $numbers[$i + 2];
            $windowB = $numbers[$i + 1] + $numbers[$i + 2] + $numbers[$i + 3];

            if ($windowB > $windowA) {
                $increased++;
            }
        }

        $this->partTwo = $increased;

        return view('livewire.day01');
    }
}
