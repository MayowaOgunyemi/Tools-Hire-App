<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $tool->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            
            <div class="grid grid-cols-2 gap-5">
                <div class="bg-white rounded-md h-auto ">
                    <div class="flex gap-5 min-w-max">
                        @forelse ($tool->getMedia('tools') as $image)
                        <img src="{{ $image->getFullUrl() }}" class="w-40 object-contain" alt="..." />
                        @empty
                        <img src="{{ asset('img/placeholder.svg') }}" class="w-1/2  object-cover" alt="">
                        @endforelse
                    </div>
                </div>
                <div class="bg-white rounded-md p-4">
                    <x-tool-rating :rating="$tool->averageRating()" />
                    @livewire('tools.rent-tool', ['tool' => $tool])
                </div>
            </div>

            <div class="bg-white rounded-md h-auto text-gray-600  grid grid-cols-2 p-4">
                <div class="flex flex-col items-center">
                    <span class="text-2xl font-bold">{{ $tool->averageRating() }}/5</span>
                    <x-tool-rating :rating="$tool->averageRating()" />
                </div>

                <div class="flex flex-col gap-4">
                    <div>
                        <livewire:add-review-form :tool="$tool" />
                    </div>
                    @forelse ($tool->reviews->take(7) as $review)
                    <div class="grid grid-cols-2 justify-between items-start bg-gray-200 px-4 py-2 rounded-md">
                    
                        <div>
                            <p class="text-gray-800 font-semibold">{{ $tool->user->name }}</p>
                            <p>{{ $review->comment }}</p>

                            
                        </div>
                        <div class="flex items-end mb-1 flex-col">
                            <div class="flex items-center mb-1">
                                @php
                                    $averageRating = ($review->performance_rating +
                                    $review->customer_service_rating +
                                    $review->support_rating +
                                    $review->after_sales_support_rating +
                                    ($review->miscellaneous_rating ?? 0)) / 5;
                                @endphp
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$averageRating) <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-yellow-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z" />
                                    </svg>
                                    @endif
                                    @endfor
                                    <span class="ml-1 font-extrabold">{{ number_format($averageRating, 1) }}</span>
                            </div>
                            <span class="text-sm">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        @livewire('reply-form', ['review' => $review->id] )

                            <div class="px-5 bg-gray-100 py-2 mt-2 w-full col-span-2">
                                {{-- <h3>Replies:</h3> --}}
                                @forelse ($review->replies as $reply)
                                    <div class="flex justify-between items-center space-y-3">
                                        <div>
                                        <p class="text-gray-800 font-semibold">{{ $reply->user->name }}</p>
                                        </div>
                                        <div class="flex flex-col">
                                        <p >{{ $reply->content }}</p>
                                        <p>{{ $reply->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    @empty
                                    <span>No replies yet...</span>
                                @endforelse
                            </div>
                    </div>
                    @empty
                    <span>No reviews yet...</span>
                    @endforelse
                    {{-- <div>
                        <livewire:add-review-form :tool="$tool" />
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>