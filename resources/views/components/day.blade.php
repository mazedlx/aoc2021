@props(['day', 'codeOne', 'codeTwo', 'solutionOne', 'solutionTwo'])

<div class="flex flex-col w-5/6 mx-auto space-y-5">
    <a href="/" class="hover:text-light-green text-green">Back</a>

    <h1 class="text-4xl text-green text-shadow">Day {{ $day }}</h1>

    <div class="flex justify-between space-x-10">
        <x-code part="1" :code="$codeOne" :solution="$solutionOne" />

        <x-code part="2" :code="$codeTwo" :solution="$solutionTwo" />
    </div>
</div>
