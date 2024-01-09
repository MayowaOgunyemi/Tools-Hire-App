<div>
    <h2 class="font-bold text-2xl">{{$tool->name}}</h2>
    <div class="flex flex-col mt-2 text-gray-700">
        <p class="text-lg font-bold">€{{$tool->cost}} <span class="font-normal">(per day)</span></p>
        <form wire:submit="createOrder">
            <div class="grid grid-cols-2 gap-5 my-4">
                <div>
                    <x-input-label for="startDate" :value="__('Start date')" />
                    <x-text-input wire:model.live="startDate" id="startDate" class="block mt-1 w-full" type="date" name="startDate" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('startDate')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="endDate" :value="__('End Date')" />
                    <x-text-input wire:model.live="endDate" id="endDate" class="block mt-1 w-full" type="date" name="endDate" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('endDate')" class="mt-2" />
                </div>
            </div>


            <x-primary-button class="my-3 bg-blue-700 hover:bg-blue-600">
                {{ __('Rent') }}
            </x-primary-button>

        </form>
        <span class="text-gray-800 font-medium">Description:</span>
        <p>{{ $tool->description }}</p>

    </div>
</div>
