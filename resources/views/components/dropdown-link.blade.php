@props(['active' => false])

@php
$classes = ($active ?? false)
            ? 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-900 bg-[#D4BE7F] focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-[#D4BE7F] hover:text-gray-900 focus:outline-none focus:bg-[#D4BE7F] focus:text-gray-900 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>