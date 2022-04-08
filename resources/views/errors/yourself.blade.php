@extends('layouts.app')

@section('content')
<div class="flex flex-col w-full h-screen pb-28 items-center justify-center">
    <div class="organic absolute block z-0"></div>
    <div class="z-30 text-white-traslucid text-5xl text-center font-thin">
         Oops!<br>
         You're looking for yourself
    </div>
    <x-link tabindex="0" aria-label="Ir a inicio" class="mt-6" title="Ir a inicio." href="{{ url('/') }}">
        Go to home
    </x-link>
</div>
@endsection
