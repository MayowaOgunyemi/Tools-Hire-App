@props(['name', 'label'])
<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <div x-data="{ {{ $name }}: @entangle($name).defer }" class="flex">
        <template x-for="star in [1, 2, 3, 4, 5]" :key="star"class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" @mouseleave="{{ $name }} = {{ $name }}" @mouseover="{{ $name }} = star" @click="$wire.setRating(star,'{{ $name }}')" class="h-5 w-5 cursor-pointer fill-none" viewBox="0 0 20 20"
            x-bind:class="{ 'fill-yellow-500': {{ $name }} >= star, 'text-gray-200 border-white ': {{ $name }} < star }"
            fill="none" viewBox="0 0 24 24" stroke="#c9c6c6" >
                <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z"/>
            </svg>
        </template>
        <input type="hidden" wire:model.defer="{{ $name }}" />
    </div>
</div>


{{-- @props(['name', 'label'])

<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <div x-data="{ {{ $name }}: @entangle($name).defer, selectedRating: 0 }" class="flex">
        <template x-for="star in [1, 2, 3, 4, 5]" :key="star" class="flex">
            <svg xmlns="http://www.w3.org/2000/svg"
                 @mouseenter="selectedRating = star" @mouseleave="selectedRating = 0" @click="$wire.setRating(star, '{{ $name }}')"
                 :class="{ 'fill-yellow-500': selectedRating >= star, 'text-gray-200 border-white': selectedRating < star }"
                 class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="none">
                <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z"/>
            </svg>
        </template>
        <input type="hidden" wire:model.defer="{{ $name }}" />
    </div>
</div> --}}






