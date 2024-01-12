<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <ul>
                <div class="flex gap-5 ">
                    @forelse ($categories as $category)
                    <a href="{{ route('category', ['category' => $category->slug]) }}">
                    <div class="flex flex-col text-gray-600 font-semibold bg-white dark:bg-gray-700 hover:shadow-md cursor-pointer rounded-2xl px-4 py-2 justify-center items-center w-80 h-80">
                        <img src="https://ui-avatars.com/api/?name={{ $category->name }}')" class="w-40 rounded-lg  dark:bg-gray-800" alt="{{ $category->description }}">
                        <li class="text-lg mt-2 dark:text-gray-100">{{ $category->name }}</li>
                    </div>
                    </a>
                    @empty
                    <li class="text-gray-100">No categories yet...</li>
                    @endforelse
                </div>
            </ul>
        </div>
    </div>
    </div>
</x-app-layout>