<div>
    <button type="button" x-on:click.prevent="$dispatch('open-modal', 'rate-tool')" class="bg-blue-600 font-medium hover:bg-blue-500 text-white px-2 py-1 rounded-md w-full">Add Review</button>

    <x-modal name="rate-tool" :show="$errors->isNotEmpty()" focusable>

        <div class="bg-white p-8 rounded shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Add Review</h2>

            <form wire:submit.prevent="submitReview">

                <div class="grid gap-y-4">
                    <div>
                        <x-individual-rating :name="'performanceRating'" :label="'Performance Rating'" />
                        <x-input-error :messages="$errors->get('performanceRating')" class="mt-2" />
                    </div>
                    <div>
                        <x-individual-rating :name="'customerServiceRating'" :label="'Customer Service Rating'" />
                        <x-input-error :messages="$errors->get('customerServiceRating')" class="mt-2" />
                    </div>
                    <div>
                        <x-individual-rating :name="'supportRating'" :label="'Support Rating'" />
                        <x-input-error :messages="$errors->get('supportRating')" class="mt-2" />
                    </div>
                    <div>
                        <x-individual-rating :name="'afterSalesSupportRating'" :label="'After Sales Support Rating'" />
                        <x-input-error :messages="$errors->get('afterSalesSupportRating')" class="mt-2" />
                    </div>

                    <div>
                        <label for="comment">Describe your review</label>
                        <x-textarea wire:model="comment" id="comment" placeholder="Type here..."
                            class="block mt-1 w-full" name="comment" />
                    </div>
                </div>

                <button type="submit" class="mt-4 bg-blue-700 hover:bg-blue-600 rounded-md px-3 py-2 text-white">Submit Review</button>
            </form>
        </div>
        {{-- <button type="button" x-on:click="$dispatch('close')">Close</button> --}}
    </x-modal>

</div>