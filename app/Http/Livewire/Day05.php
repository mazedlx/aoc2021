<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day05 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input05.txt'));
        $this->codeOne = Storage::disk('files')->get('day05_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day05_2.txt');

        $coords = collect(explode(\PHP_EOL, $this->input))
            ->map(fn ($line) => explode(' -> ', $line))
            ->map(
                fn ($coords) => collect($coords)
                    ->map(fn ($point) => explode(',', $point))
            )->filter(
                fn ($points) => $points[0][0] === $points[1][0]
                    || $points[0][1] === $points[1][1]
            )->values()
            ->toArray();

        $field = [];

        for ($i = 0; $i < 1000; $i++) {
            for ($j = 0; $j < 1000; $j++) {
                $field[$i][$j] = '0';
            }
        }

        foreach ($coords as $coord) {
            if ($coord[0][0] === $coord[1][0]) {
                $start = $coord[0][1];
                $end = $coord[1][1];
                if ($end < $start) {
                    [$end, $start] = [$start, $end];
                }

                for ($i = $start; $i <= $end; $i++) {
                    $field[$i][$coord[0][0]]++;
                }
            }
            if ($coord[0][1] === $coord[1][1]) {
                $start = $coord[0][0];
                $end = $coord[1][0];
                if ($end < $start) {
                    [$end, $start] = [$start, $end];
                }
                for ($i = $start; $i <= $end; $i++) {
                    $field[$coord[0][1]][$i]++;
                }
            }
        }

        $overlappingPoints = collect($field)
    ->map(fn ($row) => collect($row)
        ->reduce(function ($carry, $item) {
            if ($item >= 2) {
                return $carry + 1;
            }

            return $carry;
        }))->filter()->reduce(fn ($carry, $item) => $carry + $item);

        $this->solutionOne = $overlappingPoints;

        $coords = collect(explode(\PHP_EOL, $this->input))
            ->map(fn ($line) => explode(' -> ', $line))
            ->map(
                fn ($coords) => collect($coords)
                    ->map(fn ($point) => explode(',', $point))
            )->values()
            ->toArray();

        $field = [];

        for ($i = 0; $i < 1000; $i++) {
            for ($j = 0; $j < 1000; $j++) {
                $field[$i][$j] = '0';
            }
        }

        for ($i = 0; $i < 1000; $i++) {
            for ($j = 0; $j < 1000; $j++) {
                $field[$i][$j] = '0';
            }
        }

        foreach ($coords as $coord) {
            [$startY, $startX] = $coord[0];
            [$endY, $endX] = $coord[1];

            if ($endX > $startX && $endY === $startY) {
                for ($i = $startX; $i <= $endX; $i++) {
                    $field[$i][$startY]++;
                }
            } elseif ($endX < $startX && $endY === $startY) {
                for ($i = $startX; $i >= $endX; $i--) {
                    $field[$i][$startY]++;
                }
            } elseif ($endX === $startX && $endY > $startY) {
                for ($j = $startY; $j <= $endY; $j++) {
                    $field[$startX][$j]++;
                }
            } elseif ($endX === $startX && $endY < $startY) {
                for ($j = $startY; $j >= $endY; $j--) {
                    $field[$startX][$j]++;
                }
            } elseif ($endX > $startX && $endY > $startY) {
                for ($i = $startX, $j = $startY; $i <= $endX; $i++, $j++) {
                    $field[$i][$j]++;
                }
            } elseif ($endX < $startX && $endY < $startY) {
                for ($i = $startX, $j = $startY; $i >= $endX; $i--, $j--) {
                    $field[$i][$j]++;
                }
            } elseif ($endX > $startX && $endY < $startY) {
                for ($i = $startX, $j = $startY; $i <= $endX; $i++, $j--) {
                    $field[$i][$j]++;
                }
            } elseif ($endX < $startX && $endY > $startY) {
                for ($i = $startX, $j = $startY; $i >= $endX; $i--, $j++) {
                    $field[$i][$j]++;
                }
            }
        }

        $overlappingPoints = collect($field)
            ->map(
            fn ($row) => collect($row)
                ->reduce(function ($carry, $item) {
                    if ($item >= 2) {
                        return $carry + 1;
                    }

                    return $carry;
                }))->filter()->reduce(fn ($carry, $item) => $carry + $item);

        $this->solutionTwo = $overlappingPoints;
    }

    public function render()
    {
        return view('livewire.day05');
    }
}
