@props(['part', 'code', 'solution'])
<div class="flex-1">
    <h2 class="text-2xl text-green text-shadow font-code">Part {{ $part }}</h2>
    <pre>
        <code class="language-php">{{ $code }}</code>
    </pre>

    <div class="flex space-x-1">
        <div class="mr-1">Part {{ $part }}:</div>
        <div class="border-px border-light-gray">{!! $solution !!}</div>
    </div>
</div>
