<div class="w-full h-screen items-center justify-center flex flex-col space-y-10">
    <h1 class="text-[#00cc00] text-shadow text-5xl">Advent of Code 2021 in Laravel</h1>

    <div class="grid grid-cols-5 gap-x-4 gap-y-6">
        @foreach (range(1,25) as $day)
        <div>
            <a
                href="{{ route('days.show', $day) }}"
                class="w-full inline-flex items-center justify-center border-2 border-gray px-4 py-2 hover:text-light-green text-green"
            >Day {{ $day }}</a>
        </div>
        @endforeach
    </div>
</div>
