@props(['variant' => 'primary', 'href' => null, 'size' => 'default'])

@php
    $styles = [
        'primary' => 'inline-flex items-center rounded-full bg-[#00D5BE] text-white font-bold transition duration-300 ease-out hover:bg-[#00b4a1] hover:shadow-lg',
        'secondary' => 'inline-flex items-center rounded-full bg-gray-900 text-white font-bold transition duration-300 ease-out hover:bg-gray-800 hover:shadow-lg',
    ];

    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'default' => 'px-8 py-4',
        'lg' => 'px-10 py-5 text-lg'
    ];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $styles[$variant] . ' ' . $sizes[$size]]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $styles[$variant] . ' ' . $sizes[$size]]) }}>
        {{ $slot }}
    </button>
@endif