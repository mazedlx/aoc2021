<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day04 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input04.txt'));
        $this->codeOne = Storage::disk('files')->get('day04_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day04_2.txt');

        $numbers = explode(',', explode(\PHP_EOL, $this->input)[0]);

        $boards = collect(explode(\PHP_EOL, $this->input))
            ->filter(fn ($line, $i) => $i > 1)
            ->filter(fn ($line) => '' !== $line)
            ->values()
            ->map(fn ($line) => preg_split('/\s+/', trim($line)))
            ->chunk(5)
            ->map(fn ($board) => $board->values())
            ->toArray();

        function checkBoard($board)
        {
            foreach ($board as $row => $cols) {
                $checkRows = array_reduce($cols, function ($carry, $col) {
                    return mb_strstr($col, '*') ? (1 + $carry) : $carry;
                }, 0);
                if (5 === $checkRows) {
                    return true;
                }
            }

            for ($col = 0; $col <= 4; $col++) {
                $checkCols = 0;
                for ($row = 0; $row <= 4; $row++) {
                    if (mb_strstr($board[$row][$col], '*')) {
                        $checkCols++;
                    }
                    if (5 === $checkCols) {
                        return true;
                    }
                }
            }

            return false;
        }

        function markBoard($board, $number)
        {
            return collect($board)->map(function ($row) use ($number) {
                return collect($row)->map(function ($digit) use ($number) {
                    return $digit === $number ? $digit . '*' : $digit;
                });
            })->values()
            ->toArray();
        }

        function finalScore($board, $number)
        {
            return collect($board)->map(function ($row) {
                return collect($row)->reduce(function ($carry, $item) {
                    return ! mb_strstr($item, '*') ? ($item + $carry) : $carry;
                });
            })->reduce(function ($carry, $item) {
                return $carry + $item;
            }, 0) * $number;
        }

        $j = 0;
        $winner = false;
        while (! $winner) {
            foreach ($boards as $i => $board) {
                $boards[$i] = markBoard($board, $numbers[$j]);
                if (checkBoard($boards[$i])) {
                    $winningBoard = $boards[$i];
                    $winningNumber = $numbers[$j];
                    $winner = true;
                }
            }
            $j++;
        }

        $this->solutionOne = finalScore($winningBoard, $winningNumber);

        $j = 0;
        $winners = [];

        while (\count($winners) < \count($boards)) {
            foreach ($boards as $i => $board) {
                $boards[$i] = markBoard($board, $numbers[$j]);
                if (checkBoard($boards[$i]) && ! \in_array($i, $winners, true)) {
                    $winners[] = $i;
                }
            }
            $j++;
        }

        $this->solutionTwo = finalScore($boards[array_pop($winners)], $numbers[$j - 1]);
    }

    public function render()
    {
        return view('livewire.day04');
    }
}
