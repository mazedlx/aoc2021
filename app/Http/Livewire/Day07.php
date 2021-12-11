<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day07 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input07.txt'));
        $this->codeOne = Storage::disk('files')->get('day07_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day07_2.txt');

        $crabs = explode(',', $this->input);

        $positions = [];
        for ($i = 0; $i < \count($crabs); $i++) {
            foreach ($crabs as $pos => $crab) {
                $positions[$i] = ($positions[$i] ?? 0) + abs($crab - $i);
            }
        }

        $this->solutionOne = collect($positions)->min();

        $positions = [];
        for ($i = 0; $i < \count($crabs); $i++) {
            foreach ($crabs as $pos => $crab) {
                $value = array_reduce(range(0, abs($crab - $i)), fn ($carry, $item) => $carry + $item, 0);

                $positions[$i] = ($positions[$i] ?? 0) + $value;
            }
        }

        $this->solutionTwo = collect($positions)->min();
    }

    public function render()
    {
        return view('livewire.day07');
    }
}
