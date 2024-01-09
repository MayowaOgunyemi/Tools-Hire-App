<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tools') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <ul>
                <div class="flex gap-5 ">
                    @forelse ($tools as $tool)
                    <a href="{{ route('tool', ['tool' => $tool->slug]) }}">
                    <div class="flex flex-col text-white font-semibold bg-gray-700 hover:bg-gray-800 cursor-pointer rounded-2xl py-2 justify-center items-center">
                        <li class="text-lg">{{ $tool->name }}</li>
                        <img src="{{ asset('img/rocket.png') }}" class="w-fit" alt="{{ $tool->description }}">
                    </div>
                    </a>
                    @empty
                    <li>No tools yet...</li>
                    @endforelse
            </ul>
        </div>
    </div>
    </div>
</x-app-layout>