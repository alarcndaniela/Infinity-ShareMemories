@props(['active'])

@php
$classes = ($active ?? false)
            ? 'w-auto md:text-xl block text-sm :focus focus:border-purple text-white'
            : 'w-auto md:text-xl block text-sm :focus focus:border-purple transition transform hover:scale-110 duration-500 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
