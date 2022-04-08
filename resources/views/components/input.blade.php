@props(['disabled' => false])

<input  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-light-gray block w-full mt-5 text-base p-5 rounded-lg shadow-sm border-gray-300 placeholder-white-traslucid
focus:border-transparent focus:outline-none ']) !!}>
