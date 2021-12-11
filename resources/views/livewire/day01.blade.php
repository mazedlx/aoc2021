<div>
    <code>
    $numbers = explode(PHP_EOL, $input);
    $increased = 0;
    for ($i = 1; $i < count($numbers); $i++) {
        if ($numbers[$i] > $numbers[$i - 1]) {
            $increased++;
        }
    }

    echo 'Part 1: ' . $increased;
    </code>
</div>
