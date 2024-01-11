<div class="col-span-2">

    @if ($state)
    <form wire:submit.prevent="saveReply">
        @csrf
            <div>
                <x-textarea wire:model="content" :rows="2" :cols="50" id="content" required placeholder="Type your reply here..."
                    class="block mt-1 w-full" name="content" />
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <button type="submit" class="bg-blue-500 text-white px-2 mt-2 rounded py-1">Reply</button>
    </form>
        @else
        <button  wire:click='showReplyForm' class="bg-blue-500 text-white px-2 mt-2 rounded py-1">Reply</button>
    @endif
    
</div>