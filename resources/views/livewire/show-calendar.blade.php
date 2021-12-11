<div class="flex flex-col items-center justify-center w-full h-screen space-y-10">
    <h1 class="text-5xl text-green text-shadow">Advent of Code 2021 in Laravel</h1>

    <div class="grid grid-cols-5 gap-x-4 gap-y-6">
        @foreach (range(1,25) as $day)
        <div>
            <a
                href="days/{{ $day }}"
                class="inline-flex items-center justify-center w-full px-4 py-2 border-2 border-gray hover:text-light-green text-green"
            >Day {{ $day }}</a>
        </div>
        @endforeach
    </div>
</div>
