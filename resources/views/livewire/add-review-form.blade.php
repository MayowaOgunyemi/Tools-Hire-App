{{-- <div>
    <button type="button" x-on:click.prevent="$dispatch('open-modal', 'rate-tool')">Add Review</button>

    <x-modal name="rate-tool" :show="$errors->isNotEmpty()" focusable> --}}
        





        <div class="bg-white p-8 rounded shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Add Review</h2>

            <form wire:submit.prevent="submitReview">
                
                
                <div>
                    <label for="performanceRating">Performance Rating</label>
                    <div x-data="{ performanceRating: @entangle('performanceRating').defer }" class="flex">
                        <template x-for="star in [1, 2, 3, 4, 5]" :key="star"class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" @mouseover="performanceRating = star" @click="$wire.setRating(star)" class="h-5 w-5 cursor-pointer fill-none" viewBox="0 0 20 20"
                            x-bind:class="{ 'fill-yellow-500': performanceRating >= star, 'text-gray-200 border-white ': performanceRating < star }"
                            fill="none" viewBox="0 0 24 24" stroke="#c9c6c6" >
                                <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z"/>
                            </svg>
                        </template>
                        <input type="hidden" wire:model.defer="performanceRating" />
                    </div>
                </div>

                <x-textarea wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                
                
                <!-- Add other rating inputs similarly -->

               

                <button type="submit">Submit Review</button>
            </form>

        </div>










            {{-- <button type="button" x-on:click="showModal = false">Close</button> --}}
    {{-- </x-modal>

</div> --}}

