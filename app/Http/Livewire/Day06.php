<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day06 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input06.txt'));
        $this->codeOne = Storage::disk('files')->get('day06_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day06_2.txt');

        $fish = explode(',', $this->input);

        for ($day = 0; $day < 80; $day++) {
            foreach ($fish as $index => $f) {
                $fish[$index]--;
                if (-1 === $fish[$index]) {
                    $fish[$index] = 6;
                    $fish[] = 8;
                }
            }
        }

        $this->solutionOne = \count($fish);

        $fish = explode(',', $this->input);

        $groupedFish = array_fill(0, 8, 0);

        foreach ($fish as $key) {
            $groupedFish[$key]++;
        }

        for ($day = 1; $day <= 256; $day++) {
            $newFish = $groupedFish[0];

            for ($x = 1; $x <= 8; $x++) {
                $groupedFish[$x - 1] = $groupedFish[$x] ?? 0;
            }

            $groupedFish[6] += $newFish;
            $groupedFish[8] = $newFish;
        }

        $this->solutionTwo = array_sum($groupedFish);
    }

    public function render()
    {
        return view('livewire.day06');
    }
}
