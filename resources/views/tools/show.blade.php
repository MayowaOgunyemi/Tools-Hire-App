<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $tool->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- <ul>
                <div class="flex gap-5 ">
                    <a href="{{ route('tool', ['tool' => $tool->name]) }}">
                    <div class="flex flex-col text-white font-semibold bg-gray-700 hover:bg-gray-800 cursor-pointer rounded-2xl p-2 ">
                        <li class="text-lg">{{ $tool->name }}</li>
                        <span>Category: {{ $tool->category->name }}</span>
                        <img src="{{ asset('img/rocket.png') }}" class="w-fit" alt="{{ $tool->description }}">
                    </div>
                    </a>
            </ul> --}}
            <div class="grid grid-cols-2 gap-5">

                <div class="bg-white rounded-md h-auto ">
                    <div class="flex gap-5 min-w-max">

                        @forelse ($tool->getMedia('tools') as $image)
                            <img src="{{ $image->getFullUrl() }}" class="w-40 object-contain" alt="..." /> 
                        @empty
                            <span>No image uploaded</span>
                        @endforelse
                    </div>
                </div>
                <div class="bg-white rounded-md p-4">
                    <x-tool-rating :rating="$tool->averageRating()"/>
                        @livewire('tools.rent-tool', ['tool' => $tool])
                    
                </div>
            </div>
            
            <div class="container mx-auto mt-8 mb-12">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-1/2 pr-4">
                        <!-- Image Carousel -->
                        <div class="carousel">
                            <!-- Replace with your image carousel code using Tailwind CSS classes -->
                        </div>
                        <!-- Review Card -->
                        <div class="card mt-4 p-4">
                            <h6 class="font-semibold">Reviews</h6>
                            <div class="flex items-center mt-2">
                                <!-- Star Ratings -->
                                <div class="flex items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $tool->averageRating())
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="ml-2 font-bold">{{$tool->averageRating()}}</span>
                                </div>
                            </div>
                            <!-- Other Review Stats -->
                            <hr class="my-4">
                            <!-- Replace with your other review stats using Tailwind CSS classes -->
                        </div>
                        <!-- Comment Section -->
                        <div class="card mt-4 p-4 overflow-y-auto max-h-96">
                            <!-- Replace with your comment section using Tailwind CSS classes -->
                        </div>
                        <!-- Add Review Button (if applicable) -->
                        @if (Auth::user()->role == (0))
                            <!-- Replace with your "Add Review" button using Tailwind CSS classes -->
                        @endif
                    </div>
                    <div class="md:w-1/2">
                        <!-- Tool Details Card -->
                        <div class="card p-4">
                            <!-- Tool Name and Price -->
                            <h2 class="font-bold text-2xl">{{$tool->name}}</h2>
                            <div class="flex items-center mt-2">
                                <h4 class="text-lg font-bold">€{{$tool->cost}}</h4>
                                <h6 class="ml-2">(per day)</h6>
                            </div>
                            <!-- Rental Duration Form -->
                            <form class="my-4">
                                <!-- Replace with your rental duration form using Tailwind CSS classes -->
                            </form>
                            <!-- Buttons (Add to Cart, Buy Now, Wishlist) -->
                            <div class="flex gap-4">
                                <!-- Replace with your buttons using Tailwind CSS classes -->
                            </div>
                            <hr class="my-4">
                            <!-- Product Description and Features -->
                            <div>
                                <!-- Replace with your product description and features using Tailwind CSS classes -->
                            </div>
                        </div>
                        <!-- Edit Button (if applicable) -->
                        @if (Auth::user()->role == (1 or 2))
                            <!-- Replace with your "Edit" button using Tailwind CSS classes -->
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
</x-app-layout>