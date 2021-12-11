<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day10 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input10.txt'));
        $this->codeOne = Storage::disk('files')->get('day10_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day10_2.txt');

        $this->solutionOne = collect(explode(\PHP_EOL, $this->input))
        ->map(function ($line) {
            while (true) {
                $old = $line;
                $line = str_replace(['<>', '()', '{}', '[]'], '', $line);
                if ($old === $line) {
                    break;
                }
            }

            $expectations = [
                '[' => ']',
                '{' => '}',
                '(' => ')',
                '<' => '>',
            ];

            $points = [
                ']' => 57,
                '}' => 1197,
                ')' => 3,
                '>' => 25137,
            ];

            foreach (mb_str_split($line) as $index => $char) {
                if (\in_array($char, ['>', '}', ']', ')'], true)) {
                    $expected = $expectations[$line[$index - 1]];
                    $found = $char;

                    return $points[$found];
                    break;
                }
            }
        })
        ->filter()
        ->reduce(fn ($carry, $item) => $carry + $item, 0);

        $expectations = [
            '[' => ']',
            '{' => '}',
            '(' => ')',
            '<' => '>',
            ']' => '',
            '}' => '',
            ')' => '',
            '>' => '',
        ];

        $points = [
            ']' => 2,
            '}' => 3,
            ')' => 1,
            '>' => 4,
        ];

        $numbers = collect(explode(\PHP_EOL, $this->input))
            ->map(function ($line) {
                $original = $line;
                while (true) {
                    $old = $line;
                    $line = str_replace(['<>', '()', '{}', '[]'], '', $line);
                    if ($old === $line) {
                        break;
                    }
                }

                if (! mb_strstr(str_replace(['>', '}', ']', ')'], 'x', $line), 'x')) {
                    return $line;
                }
            })
            ->filter()
            ->map(function ($line) use ($expectations) {
                while (true) {
                    $old = $line;
                    $line = str_replace(['<>', '()', '{}', '[]'], '', $line);

                    if ($old === $line) {
                        break;
                    }
                }
                $chars = mb_str_split($line);
                krsort($chars);

                return collect($chars)
                    ->map(fn ($char) => $expectations[$char])
                    ->sortKeysDesc()->join('');
            })
            ->map(fn ($line) => mb_str_split(str_replace(array_keys($points), $points, $line)))
            ->map(fn ($line) => collect($line)->reduce(function ($carry, $item) {
                return ($carry * 5) + $item;
            }, 0))->sort();

        $this->solutionTwo = $numbers->skip(floor($numbers->count() / 2))->take(1)->values()[0];
    }

    public function render()
    {
        return view('livewire.day10');
    }
}
