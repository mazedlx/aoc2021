<div class="flex flex-col w-5/6 mx-auto space-y-5">
    <a href="/" class="hover:text-light-green text-green">Back</a>
    <div class="flex justify-between">
        <div>
            <h2 class="text-2xl text-green text-shadow font-code">Part 1</h2>
            <pre>
            <code class="language-php">
            &lt;?php

            $input = '103
            ...
            6740';

            $numbers = explode(PHP_EOL, $input);
            $increased = 0;

            for ($i = 1; $i < count($numbers); $i++) {
                if ($numbers[$i] > $numbers[$i - 1]) {
                    $increased++;
                }
            }

            echo 'Part 1: ' . $increased;
            </code>
            </pre>

            <div>Part 1: <span class="border-[1px] border-[#333340]">{{ $partOne }}</span></div>
        </div>
    <div>

        <h2 class="text-2xl text-green text-shadow font-code">Part 2</h2>

        <pre>
        <code class="language-php">
        &lt;?php

        $input = '103
        ...
        6740';

        $numbers = explode(PHP_EOL, $input);
        $increased = 0;
        for ($i = 0; $i < count($numbers) - 3; $i++) {
            $windowA = $numbers[$i] + $numbers[$i + 1] + $numbers[$i + 2];
            $windowB = $numbers[$i + 1] + $numbers[$i + 2] + $numbers[$i + 3];

            if ($windowB > $windowA) {
                $increased++;
            }
        }

        echo 'Part 2: ' . $increased;
        </code>
        </pre>

        <div>Part 2: <span class="border-[1px] border-[#333340]">{{ $partTwo }}</span></div>
    </div>
    </div>
</div>
