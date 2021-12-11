<div class="flex flex-col w-5/6 mx-auto space-y-5">
    <a href="/" class="hover:text-light-green text-green">Back</a>

    <h1 class="text-4xl text-green text-shadow">Day 01</h1>

    <div class="flex justify-between space-x-10">
        <div class="flex-1">
            <h2 class="text-2xl text-green text-shadow font-code">Part 1</h2>
            <pre>
                <code class="language-php">{{ $codeOne }}</code>
            </pre>

            <div>Part 1: <span class="border-[1px] border-[#333340]">{{ $partOne }}</span></div>
        </div>

        <div class="flex-1">
            <h2 class="text-2xl text-green text-shadow font-code">Part 2</h2>

            <pre>
                <code class="language-php">{{ $codeTwo }}</code>
            </pre>

            <div>Part 2: <span class="border-[1px] border-[#333340]">{{ $partTwo }}</span></div>
        </div>
    </div>
</div>
