<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Day12 extends Component
{
    public $input;
    public $solutionOne;
    public $solutionTwo;
    public $codeOne;
    public $codeTwo;

    public function mount()
    {
        $this->input = trim(Storage::disk('files')->get('input12.txt'));
        $this->codeOne = Storage::disk('files')->get('day12_1.txt');
        $this->codeTwo = Storage::disk('files')->get('day12_2.txt');

        $lines = collect(explode(\PHP_EOL, $this->input))
            ->map(fn ($line) => explode('-', $line))
            ->values()
            ->toArray();

        $connections = [];
        foreach ($lines as $line) {
            [$a, $b] = $line;
            if ('start' !== $b && 'end' !== $a) {
                $connections[$a][] = $b;
            }
            if ('start' !== $a && 'end' !== $b) {
                $connections[$b][] = $a;
            }
        }

        $validPaths = [];
        $paths = [
            ['start'],
        ];

        while (\count($paths)) {
            $nextPaths = [];
            foreach ($paths as $path) {
                $cave = $path[\count($path) - 1];
                foreach ($connections[$cave] as $nextCave) {
                    $nextPath = [...$path, $nextCave];
                    if ('end' === $nextCave) {
                        $validPaths[] = $nextPath;
                        continue;
                    }
                    $smallCaves = array_filter(
                $nextPath, fn ($cave) => preg_match('/[a-z]/', $cave)
            );
                    if (\count($smallCaves) > \count(array_unique($smallCaves))) {
                        continue;
                    }
                    $nextPaths[] = $nextPath;
                }
            }
            $paths = $nextPaths;
        }

        $this->solutionOne = \count($validPaths);

        $connections = [];
        foreach ($lines as $line) {
            [$a, $b] = $line;
            if ('start' !== $b && 'end' !== $a) {
                $connections[$a][] = $b;
            }
            if ('start' !== $a && 'end' !== $b) {
                $connections[$b][] = $a;
            }
        }

        $validPaths = [];
        $paths = [
            ['start'],
        ];

        while (\count($paths)) {
            $nextPaths = [];
            foreach ($paths as $path) {
                $cave = $path[\count($path) - 1];
                foreach ($connections[$cave] as $nextCave) {
                    $nextPath = [...$path, $nextCave];
                    if ('end' === $nextCave) {
                        $validPaths[] = $nextPath;
                        continue;
                    }
                    $smallCaves = array_filter(
                $nextPath, fn ($cave) => preg_match('/[a-z]/', $cave)
            );
                    if (\count($smallCaves) > \count(array_unique($smallCaves)) + 1) {
                        continue;
                    }
                    $nextPaths[] = $nextPath;
                }
            }
            $paths = $nextPaths;
        }

        $this->solutionTwo = \count($validPaths);
    }

    public function render()
    {
        return view('livewire.day12');
    }
}
