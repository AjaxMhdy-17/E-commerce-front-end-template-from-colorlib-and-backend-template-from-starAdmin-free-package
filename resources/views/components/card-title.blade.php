<div>
    <h4 class="text-xl font-bold text-gray-800">{{ $title }}</h4>

    @if($subtitle)
        <h5 class="text-md text-gray-600">{{ $subtitle }}</h5>
    @endif

    @if($description)
        <p class="text-sm text-gray-500 mt-2">{{ $description }}</p>
    @endif
</div>