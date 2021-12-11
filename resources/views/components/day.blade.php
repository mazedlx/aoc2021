@props(['day', 'codeOne', 'codeTwo', 'solutionOne', 'solutionTwo'])

<div class="flex flex-col w-full px-10 mx-auto space-y-5">
    <a href="/" class="hover:text-light-green text-green">Back</a>

    <h1 class="text-4xl text-green text-shadow">Day {{ $day }}</h1>

    <div class="flex flex-col justify-between space-y-10 md:space-x-10 md:flex-row md:space-y-0">
        <x-code part="1" :code="$codeOne" :solution="$solutionOne" />

        <x-code part="2" :code="$codeTwo" :solution="$solutionTwo" />
    </div>
</div>
