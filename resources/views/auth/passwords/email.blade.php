@extends('layouts.app')

@section('content')
<div class="w-full flex justify-center items-center py-24 lg:py-60 max-h-screen">
    <div class="xl:w-3/12 sm:w-7/12 bg-dark-gray rounded-3xl p-12" data-aos="fade-right" data-aos-duration="2000">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white-traslucid text-xl">{{ __('Reset your password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success text-green-400" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <x-icon-input name="email" value="{{ old('email') }}" id="email" type="email"
                        :icon="'fa fa-envelope text-gray-300 left-5 top-8 lg:top-11 absolute'" placeholder="{{ __('Email')}}" required autocomplete="email" autofocus/>
                        <div class="text-red-400 text-base mt-2 d-flex text-center">
                            {{ $errors->first('email') }}
                        </div>
                        <div class="row mb-0">
                            <div class="flex items-center justify-center mt-5">
                                <x-button type="submit" class="w-56 text-base lg:text-lg font-medium">
                                    {{ __('Send Reset Link') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
