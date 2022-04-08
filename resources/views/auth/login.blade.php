@extends('layouts.app')

@section('content')
<div class="w-full flex justify-center items-center py-24 lg:py-60 max-h-screen">
<div class="xl:w-3/12 sm:w-7/12 bg-dark-gray rounded-3xl" data-aos="fade-right" data-aos-duration="2000">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex flex-col items-center text-center mt-12">
        <img src="{{ asset('img/Vector.svg') }}" alt="" class="max-w-sm max-h-6 w-12 logo-img">
        <h4 class="text-white font-thin mt-3 text-xl lg:text-2xl">{{ __('Login') }}</h4>
    </div>
    <form method="POST" action="{{ route('login') }}" role="form" class="p-1">
        @csrf
        <x-icon-input class="mx-2 lg:mx-12" value="{{ old('username') }}" name="username" id="username" type="username" :icon="'fa fa-user text-gray-300 left-5 top-8 lg:top-11 absolute'"
            placeholder="{{ __('Username')}}"/>
        <div class="text-red-400 text-base mt-2 d-flex text-center">
            {{ $errors->first('username') }}
        </div>
        <x-icon-input class="mx-2 lg:mx-12" name="password" id="password" type="password" :icon="'fa fa-key fa-lg text-gray-300 left-5 top-8 lg:top-11 absolute'" placeholder="{{ __('Password')}}"/>
        <div class="text-red- text-base d-flex text-center">
            {{ $errors->first('password') }}
        </div>
        <div class="mt-4">
            <span class="text-gray-400 flex justify-center text-sm lg:text-base">
                {{ __('Don’t have an account?') }} &nbsp; <a href="{{ route('register') }}" class="underline">
                    {{ __('Create a new one') }}</a>
            </span>
        </div>
        <div class="flex items-center justify-center">
            <x-button class="w-56 mt-5 text-base lg:text-lg font-medium">
                {{ __('Log in') }}
            </x-button>
        </div>
        <div class="flex justify-center my-8">
            @if (Route::has('password.request'))
            <span class="text-gray-400 flex justify-center text-sm lg:text-base">
                {{ __('Forgot your password?') }} &nbsp; <a href="{{ route('password.request') }}" class="underline">
                    {{ __('Reset it') }}</a>
            </span>
            @endif
        </div>
    </form>
</div>
</div>
@endsection
