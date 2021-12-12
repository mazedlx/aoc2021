<div class="flex flex-col items-center justify-center w-full h-screen space-y-10">
    <h1 class="text-5xl text-green text-shadow">Advent of Code 2021 in PHP</h1>

    <div class="grid grid-cols-5 gap-x-4 gap-y-6">
        @foreach (range(1,25) as $day)
        <div>
        @if (class_exists('App\Http\Livewire\Day' . str_pad($day, 2, '0', STR_PAD_LEFT)))
            <a
                href="days/{{ $day }}"
                class="inline-flex items-center justify-center w-full px-4 py-8 border-2 border-gray hover:text-light-green text-green"
            >Day {{ $day }}</a>
        @else
        <div class="inline-flex items-center justify-center w-full px-4 py-8 border-2 border-gray text-gray">
            Day {{ $day }}
        </div>
        @endif
        </div>
        @endforeach
    </div>
</div>
