@props(['rating'])
<div class="flex items-center">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $rating)
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 fill-current" viewBox="0 0 20 20">
                <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z"/>
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                <path d="M10 1l2.6 6.3H19l-5 4.2 1.9 6.2L10 14.3 5.1 17.7l1.9-6.2-5-4.2h6.4L10 1z"/>
            </svg>
        @endif
    @endfor
    <span class="ml-2 font-bold">({{$rating}})</span>
</div>