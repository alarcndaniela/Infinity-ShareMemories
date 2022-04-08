@extends('layouts.app')

@section('content')
<div class="w-full flex justify-center items-center h-screen">
    <div class="xl:w-3/12 sm:w-11/12 bg-dark-gray rounded-3xl mb-16" data-aos="fade-right" data-aos-duration="2000">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="flex flex-col items-center text-center mt-12">
            <img src="{{ asset('img/Vector.svg') }}" alt="" class="max-w-sm max-h-6 w-12 logo-img">
            <h4 class="text-white font-thin mt-3 text-xl lg:text-2xl">{{ __('Register') }}</h4>
        </div>
        <form method="POST" action="{{ route('register') }}" role="form" class="p-1">
            @csrf
            <div>
                <x-icon-input class="mx-2 lg:mx-12" name="name" autofocus value="{{ old('name') }}" id="name" type="text"
                :icon="'fa fa-user text-gray-300 left-5 top-8 lg:top-11 absolute'" placeholder="{{ __('Name')}}"/>
                <div class="text-red-500 text-xs d-flex text-center">
                    {{ $errors->first('name') }}
            </div>
            <div>
                <x-icon-input class="mx-2 lg:mx-12" name="email" value="{{ old('email') }}" id="email" type="email"
                :icon="'fa fa-envelope text-gray-300 left-5 top-8 lg:top-11 absolute'" placeholder="{{ __('Email')}}"/>
                <div class="text-red-500 text-xs d-flex text-center">
                    {{ $errors->first('email') }}
                </div>
            </div>
            <div>
                <x-icon-input class="mx-2 lg:mx-12" name="username" value="{{ old('username') }}" id="username" type="text" :icon="'fa fa-address-card text-gray-300 left-5 top-8 lg:top-11 absolute'" placeholder="{{ __('Username')}}"/>
                <div class="text-red-500 text-xs d-flex text-center">
                    {{ $errors->first('username') }}
                </div>
            </div>
            <div>
                <x-icon-input class="mx-2 lg:mx-12" name="password" value="{{ old('password') }}" id="password" type="password"
                :icon="'fa fa-lock text-gray-300 left-5 top-8 lg:top-11 absolute'" placeholder="{{ __('Password')}}"/>
                <div class="text-red-500 text-xs d-flex text-center">
                    {{ $errors->first('password') }}
                </div>
            </div>
            <div>
                <x-icon-input class="mx-2 lg:mx-12" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password-confirmation" type="password"
                :icon="'fa fa-lock text-gray-300 left-5 top-8 lg:top-11 absolute'" placeholder="{{ __('Confirm password')}}"/>
                <div class="text-red-500 text-xs d-flex text-center">
                    {{ $errors->first('password_confirmation') }}
                </div>
            </div>



        {{-- @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror --}}

{{-- <div class="row mb-3">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div> --}}

            <div class="mt-4">
                <span class="text-gray-400 flex justify-center text-sm lg:text-base">
                    {{ __('Do you have an account?') }} &nbsp; <a href="{{ route('login') }}" class="underline">
                        {{ __('Log in') }}</a>
                </span>
            </div>
            <div class="flex items-center justify-center mt-5 mb-8">
                <x-button class="w-56 text-base lg:text-lg font-medium">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
@endsection

