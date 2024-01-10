<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $tool->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- <div class="flex items-center justify-center min-h-screen"> --}}
                
            {{-- </div> --}}




            

            <div class="grid grid-cols-2 gap-5">
                <div class="bg-white rounded-md h-auto ">
                    <div class="flex gap-5 min-w-max">
                        @forelse ($tool->getMedia('tools') as $image)
                        <img src="{{ $image->getFullUrl() }}" class="w-40 object-contain" alt="..." />
                        @empty
                        <img src="{{ asset('img/placeholder.svg') }}" alt="">
                        @endforelse
                    </div>
                </div>
                <div class="bg-white rounded-md p-4">
                    <x-tool-rating :rating="$tool->averageRating()" />
                    @livewire('tools.rent-tool', ['tool' => $tool])
                </div>
            </div>

            <div class="bg-white rounded-md h-auto  grid grid-cols-2 p-4">
                <div class="flex flex-col items-center">
                    <span class="text-2xl font-bold">{{ $tool->averageRating() }}/5</span>
                    <x-tool-rating :rating="$tool->averageRating()" />
                </div>
                <div class="flex flex-col gap-2">
                    <x-tool-rating :rating="$tool->averageRating()" />
                    <p>Awesome Product</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa possimus aspernatur qui</p>
                    <span>18-12-2023 by Jane Doe</span>
                    <button class="bg-blue-300 px-2 py-1 rounded-md">Reply</button>


                    <div>
                        <livewire:add-review-form :tool="$tool" />
                    </div>


                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>