{{-- <div>
    <x-tools.transaction-images :images="$getRecord()->getMedia('trades')" :id="$getState()"
        :name="$getRecord()->trade_identifier" />
</div> --}}

<div class="flex flex-row flex-wrap gap-1">
    @php
        $images = $getRecord()->getMedia('tools');
        $name= $getRecord()->trade_identifier;
    @endphp
    @forelse ($images as $image)
    <img class="w-10 h-10 object-cover rounded-full cursor-pointer" data-fancybox='{{ $name ?? 'image' }}'
    src="{{ $image ? $image->getFullUrl() : asset('images/default/gift-card.png')}}" alt="{{ $name ?? 'image' }}" loading="lazy" />
    @empty
    <span>N/A</span>
    {{-- <img class="w-8 h-8 rounded-md" src="{{ asset('images/default/gift-card.png')}}" alt="{{ $name ?? 'image' }}" loading="lazy" /> --}}
    @endforelse
</div>
