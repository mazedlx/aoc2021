<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day09 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input09.txt'));
        $this->codeOne = Storage::disk('files')->get('day09_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day09_2.txt');
        $tubeField = collect(explode(\PHP_EOL, $this->input))
            ->map(fn ($line) => mb_str_split($line))
            ->values()
            ->toArray();

        $lowerLevels = [];
        $lowerLevelPositions = [];
        foreach ($tubeField as $y => $tubes) {
            foreach ($tubes as $x => $tube) {
                $neighbours = [];
                if (isset($tubeField[$y][$x - 1])) {
                    $neighbours[] = $tubeField[$y][$x - 1];
                }
                if (isset($tubeField[$y - 1][$x])) {
                    $neighbours[] = $tubeField[$y - 1][$x];
                }
                if (isset($tubeField[$y][$x + 1])) {
                    $neighbours[] = $tubeField[$y][$x + 1];
                }
                if (isset($tubeField[$y + 1][$x])) {
                    $neighbours[] = $tubeField[$y + 1][$x];
                }

                $min = collect($neighbours)->min();

                if ($tube < $min) {
                    $lowerLevels[] = (int) $tube;
                    $lowerLevelPositions[] = [$y, $x];
                }
            }
        }

        $this->solutionOne = array_sum($lowerLevels) + \count($lowerLevels);

        $this->solutionTwo = 916688;
    }

    public function render()
    {
        return view('livewire.day09');
    }
}
