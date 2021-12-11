<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day03 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input03.txt'));
        $this->codeOne = Storage::disk('files')->get('day03_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day03_2.txt');
        $values = [];

        foreach (explode(\PHP_EOL, $this->input) as $line) {
            foreach (mb_str_split($line) as $index => $bit) {
                switch ($bit) {
            case '0':
                $values[$index]['zero'] = ($values[$index]['zero'] ?? 0) + 1;
                break;
            case '1':
                $values[$index]['one'] = ($values[$index]['one'] ?? 0) + 1;
                break;
        }
            }
        }

        $gammaDigits = [];
        $epsilonDigits = [];

        foreach ($values as $index => $onesAndZeros) {
            $gammaDigits[$index] = 0;
            $epsilonDigits[$index] = 0;
            if ($onesAndZeros['one'] > $onesAndZeros['zero']) {
                $gammaDigits[$index] = 1;
            }
            if ($onesAndZeros['one'] < $onesAndZeros['zero']) {
                $epsilonDigits[$index] = 1;
            }
        }

        $this->solutionOne = bindec(implode('', $gammaDigits)) * bindec(implode('', $epsilonDigits));

        function splitDigits($array): array
        {
            $values = [];
            foreach ($array as $line) {
                foreach (mb_str_split($line) as $index => $bit) {
                    switch ($bit) {
                case '0':
                    $values[$index]['zero'] =
                        ($values[$index]['zero'] ?? 0) + 1;
                    break;
                case '1':
                    $values[$index]['one'] = ($values[$index]['one'] ?? 0) + 1;
                    break;
            }
                }
            }

            return $values;
        }
        $lines = explode(\PHP_EOL, $this->input);

        $values = splitDigits($lines);

        $numbers = $lines;

        $i = 0;
        while (1 !== \count($numbers)) {
            $digit = $values[$i]['one'] >= $values[$i]['zero'] ? '1' : '0';
            $numbers = array_filter($numbers, function ($number) use ($i, $digit) {
                return mb_str_split($number)[$i] === $digit;
            });
            $values = splitDigits($numbers);
            $i++;
        }

        $oxygenRating = bindec(implode('', $numbers));

        $numbers = $lines;
        $i = 0;
        $values = splitDigits($lines);

        while (1 !== \count($numbers)) {
            $digit = $values[$i]['one'] >= $values[$i]['zero'] ? '0' : '1';
            $numbers = array_filter($numbers, function ($number) use ($i, $digit) {
                return mb_str_split($number)[$i] === $digit;
            });
            $values = splitDigits($numbers);
            $i++;
        }

        $scrubberRating = bindec(implode('', $numbers));
        $this->solutionTwo = $oxygenRating * $scrubberRating;
    }

    public function render()
    {
        return view('livewire.day03');
    }
}
