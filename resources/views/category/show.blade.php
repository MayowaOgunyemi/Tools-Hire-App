<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <ul>
                <div class="flex gap-5 ">
                    @forelse ($tools as $tool)
                    <a href="{{ route('tool', ['tool' => $tool->slug]) }}">
                        <div
                            class="flex flex-col text-gray-600 font-semibold bg-white dark:bg-gray-700 dark:text-gray-100 hover:bg-gray-200 cursor-pointer rounded-2xl px-4 py-2 justify-center items-center w-80 h-80">
                            <img src="{{ $tool->getFirstMediaUrl('tools') ? $tool->getFirstMediaUrl('tools') : asset('img/placeholder.svg') }}"
                                class="w-40 mb-2" alt="{{ $tool->name }}">
                            <p class="bg-[#b8b5b5]"></p>
                            <li class="text-2xl">{{ $tool->name }}</li>
                            <li class="text-lg">€{{ $tool->cost }}</li>
                            <div class="flex items-center mt-1">
                                @php
                                $totalRatings = $tool->ratings->count();
                                $averageRating = $totalRatings > 0 ? $tool->ratings->avg('rating') : 0;
                                @endphp
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$averageRating) <svg
                                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 fill-current"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z" />
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 fill-current"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z" />
                                    </svg>
                                    @endif
                                    @endfor
                                    <span class="ml-1"> ({{ $totalRatings }})</span>
                            </div>
                        </div>
                    </a>
                    @empty
                    <li class="text-gray-100">No tools yet...</li>
                    @endforelse
                </div>
            </ul>
        </div>
    </div>
</x-app-layout>