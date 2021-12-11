<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day08 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input08.txt'));
        $this->codeOne = Storage::disk('files')->get('day08_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day08_2.txt');

        $this->solutionOne = collect(explode(\PHP_EOL, $this->input))
        ->map(fn ($line) => explode(' | ', $line)[1])
        ->map(fn ($line) => explode(' ', $line))
        ->map(
            fn ($line) => collect($line)
            ->filter(fn ($item) => \in_array(mb_strlen($item), [2, 3, 4, 7], true))
            )->flatten()
            ->count();

        function findChars($string, $chars)
        {
            $found = 0;
            foreach (mb_str_split($chars) as $char) {
                if (false !== mb_strpos($string, $char)) {
                    $found++;
                }
            }

            return $found;
        }

        $lines = explode(\PHP_EOL, $this->input);
        $count = 0;
        foreach ($lines as $line) {
            $segments = [];
            $digits = [];
            preg_match_all('/[a-g]+/', $line, $bits);
            for ($i = 0; $i < \count($bits[0]); $i++) {
                $temp = mb_str_split($bits[0][$i]);
                sort($temp, \SORT_STRING);
                $bits[0][$i] = implode('', $temp);

                $positionalBit = $bits[0][$i];
                $length = mb_strlen($bits[0][$i]);
                switch ($length) {
                    case 2:
                        $segments[1] = $positionalBit;
                        $digits[$positionalBit] = 1;
                        break;
                    case 3:
                        $segments[7] = $positionalBit;
                        $digits[$positionalBit] = 7;
                        break;
                    case 4:
                        $segments[4] = $positionalBit;
                        $digits[$positionalBit] = 4;
                        break;
                    case 7:
                        $segments[8] = $positionalBit;
                        $digits[$positionalBit] = 8;
                        break;
                    }
            }

            for ($i = 0; $i < 10; $i++) {
                $positionalBit = $bits[0][$i];
                $length = mb_strlen($bits[0][$i]);
                if (! isset($digits[$positionalBit])) {
                    if (5 === $length && 2 === findChars($positionalBit, $segments[1])) {
                        $segments[3] = $positionalBit;
                        $digits[$positionalBit] = 3;
                    } elseif (6 === $length && 4 === findChars($positionalBit, $segments[4])) {
                        $segments[9] = $positionalBit;
                        $digits[$positionalBit] = 9;
                    } elseif (6 === $length && 1 === findChars($positionalBit, $segments[1])) {
                        $segments[6] = $positionalBit;
                        $digits[$positionalBit] = 6;
                    }
                }
            }

            for ($i = 0; $i < 10; $i++) {
                $positionalBit = $bits[0][$i];
                $length = mb_strlen($bits[0][$i]);
                if (! isset($digits[$positionalBit])) {
                    if (6 === $length) {
                        $segments[0] = $positionalBit;
                        $digits[$positionalBit] = 0;
                    } elseif (5 === $length && 5 === findChars($segments[6], $positionalBit)) {
                        $segments[5] = $positionalBit;
                        $digits[$positionalBit] = 5;
                    } elseif (5 === $length && 4 === findChars($segments[6], $positionalBit)) {
                        $segments[2] = $positionalBit;
                        $digits[$positionalBit] = 2;
                    }
                }
            }
            $digit = '';
            for ($i = 10; $i <= 13; $i++) {
                $digit .= $digits[$bits[0][$i]];
            }
            $count += (int) $digit;
        }

        $this->solutionTwo = $count;
    }

    public function render()
    {
        return view('livewire.day08');
    }
}
