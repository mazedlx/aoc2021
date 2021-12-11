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

        function chars_found($string, $chars)
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
            $segs = [];
            $digs = [];
            preg_match_all('/[a-g]+/', $line, $bits);
            //bits[0][0-9] are the potential, [10-13] are the outputs
            //pass one, sort everything alpha and find the easy bits (1,4,7,8)
            for ($i = 0; $i < \count($bits[0]); $i++) {
                $temp = mb_str_split($bits[0][$i]);
                sort($temp, \SORT_STRING);
                $bits[0][$i] = implode('', $temp);

                $t = $bits[0][$i];
                $s = mb_strlen($bits[0][$i]);
                switch ($s) {
            case 2:
                $segs[1] = $t;
                $digs[$t] = 1;
                break;
            case 3:
                $segs[7] = $t;
                $digs[$t] = 7;
                break;
            case 4:
                $segs[4] = $t;
                $digs[$t] = 4;
                break;
            case 7:
                $segs[8] = $t;
                $digs[$t] = 8;
                break;
        }
            }
            //pass two, find 3, 6 and 9
            for ($i = 0; $i < 10; $i++) {
                $t = $bits[0][$i];
                $s = mb_strlen($bits[0][$i]);
                if (! isset($digs[$t])) {
                    if (5 === $s && 2 === chars_found($t, $segs[1])) {
                        $segs[3] = $t;
                        $digs[$t] = 3;
                    } elseif (6 === $s && 4 === chars_found($t, $segs[4])) {
                        $segs[9] = $t;
                        $digs[$t] = 9;
                    } elseif (6 === $s && 1 === chars_found($t, $segs[1])) {
                        $segs[6] = $t;
                        $digs[$t] = 6;
                    }
                }
            }
            //pass three, find 0, 2, 5
            for ($i = 0; $i < 10; $i++) {
                $t = $bits[0][$i];
                $s = mb_strlen($bits[0][$i]);
                if (! isset($digs[$t])) {
                    if (6 === $s) {
                        $segs[0] = $t;
                        $digs[$t] = 0;
                    } elseif (5 === $s && 5 === chars_found($segs[6], $t)) {
                        $segs[5] = $t;
                        $digs[$t] = 5;
                    } elseif (5 === $s && 4 === chars_found($segs[6], $t)) {
                        $segs[2] = $t;
                        $digs[$t] = 2;
                    }
                }
            }
            $digit = '';
            for ($i = 10; $i <= 13; $i++) {
                $digit .= $digs[$bits[0][$i]];
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
