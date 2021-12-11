<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day11 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input11.txt'));
        $this->codeOne = Storage::disk('files')->get('day11_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day11_2.txt');

        $flashes = 0;

        function flash($octopuses, $y, $x, &$flashes)
        {
            $flashes++;
            $octopuses[$y][$x] = 0;
            for ($i = -1; $i <= 1; $i++) {
                for ($j = -1; $j <= 1; $j++) {
                    if (0 === $i && 0 === $j) {
                    } else {
                        if (
                    $y + $i >= 0 &&
                    $y + $i < \count($octopuses) &&
                    $x + $j >= 0 &&
                    $x + $j < \count($octopuses[$y]) &&
                    0 !== $octopuses[$y + $i][$x + $j]
                ) {
                            $octopuses[$y + $i][$x + $j]++;
                            if ($octopuses[$y + $i][$x + $j] > 9) {
                                $octopuses = flash($octopuses, $y + $i, $x + $j, $flashes);
                            }
                        }
                    }
                }
            }

            return $octopuses;
        }

        $octopuses = collect(explode(\PHP_EOL, $this->input))
            ->map(fn ($line) => collect(mb_str_split($line))
                ->map(fn ($digit) => $digit)
            )
            ->values()
            ->toArray();

        for ($n = 0; $n < 100; $n++) {
            for ($row = 0; $row < \count($octopuses); $row++) {
                for ($col = 0; $col < \count($octopuses[$row]); $col++) {
                    $octopuses[$row][$col]++;
                }
            }

            for ($row = 0; $row < \count($octopuses); $row++) {
                for ($col = 0; $col < \count($octopuses[$row]); $col++) {
                    if ($octopuses[$row][$col] > 9) {
                        $octopuses = flash($octopuses, $row, $col, $flashes);
                    }
                }
            }
        }

        $this->solutionOne = $flashes;

        $flashes = 0;

        $octopuses = collect(explode(\PHP_EOL, $this->input))
            ->map(fn ($line) => collect(mb_str_split($line))
                ->map(fn ($digit) => $digit))
            ->values()
            ->toArray();
        $sum = 1;
        $rounds = 0;

        while (0 !== $sum) {
            $rounds++;
            for ($row = 0; $row < \count($octopuses); $row++) {
                for ($col = 0; $col < \count($octopuses[$row]); $col++) {
                    $octopuses[$row][$col]++;
                }
            }

            for ($row = 0; $row < \count($octopuses); $row++) {
                for ($col = 0; $col < \count($octopuses[$row]); $col++) {
                    if ($octopuses[$row][$col] > 9) {
                        $octopuses = flash($octopuses, $row, $col, $flashes);
                    }
                }
            }

            $sum = collect($octopuses)
                ->map(fn ($row) => collect($row)->reduce(fn ($carry, $item) => $carry + $item), 0)
                    ->reduce(fn ($carry, $item) => $carry + $item, 0);
        }

        $this->solutionTwo = $rounds;
    }

    public function render()
    {
        return view('livewire.day11');
    }
}
