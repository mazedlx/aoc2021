@props(['part', 'code', 'solution'])
<div class="flex-1">
    <h2 class="text-2xl text-green text-shadow font-code">Part {{ $part }}</h2>
    <pre>
        <code class="language-php">{{ $code }}</code>
    </pre>

    <div>Part 1: <span class="border-px border-light-gray">{{ $solution }}</span></div>
</div>
