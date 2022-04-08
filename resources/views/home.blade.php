@extends('layouts.app')

@section('content')
    @guest
    <div class="flex w-full h-screen pb-32 items-center justify-center" data-aos="fade-in" data-aos-duration="3000">
        <div class="organic absolute block z-0"></div>
        <div class="z-30 text-white-traslucid lg:text-5xl text-4xl text-center font-thin">
             Welcome to Infinity <br>
             Share your memories with <b class="font-bold">friends</b>
        </div>
    </div>
    @endguest
    @auth
    <div class="relative w-full flex lg:hidden">
        <div class="w-full mt-8 flex justify-center items-center">
            <x-nav-link tabindex="0" aria-label="Ir a inicio" class="logo-link lg:hidden" title="Ir a inicio." href="{{ url('/') }}">
                <img src="{{ asset('img/Vector.svg') }}" alt="" class="max-w-sm max-h-8 w-14 logo-img">
            </x-nav-link>
        </div>
        <div class="w-full mb-4 absolute flex mx-auto justify-between items-center">
            {{-- <p class="text-light-gray text-xl">{{ Auth::user()->code }}</p> --}}
            <div class="form-group mx-4 shadow-inner text-light-gray">
                <div class="input-group input-group-copy flex items-center justify-between">
                    <span class="input-group-btn">
                        <button class="btn btn-default"><i class="fa fa-clone mr-4"></i></button>
                    </span>
                    <input id="test2" type="text"  class="form-control text-lg bg-black w-16" value="{{ Auth::user()->code }}"/>
                </div>
            </div>
            <div class="p-8" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-light-gray text-2xl" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out mr-2"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
        <div class="flex">
            <div class="mt-12 w-1/4 h-max bg-black hidden lg:block">
                @include('profile')
            </div>
            <div class="feed w-screen max-h-max min-h-screen lg:w-3/4 bg-dark-gray text-gray-800 mt-8 lg:mt-0 lg:rounded-l-3xl lg:rounded-tr-none rounded-t-3xl shadow-xl shadow-black">
                @include('feed.index', ['posts' => $posts ?? ''])
            </div>
        </div>
    @endauth
@endsection
