<div class="w-1/4 grid grid-rows-2 grid-flow-col gap-72 text-white-traslucid fixed">
    <div>
        <div class="nav-item text-light-gray flex justify-center">
            <x-nav-link tabindex="0" aria-label="Ir a inicio" class="logo-link" title="Ir a inicio." href="{{ url('/') }}">
                <img src="{{ asset('img/Vector.svg') }}" alt="" class="max-w-sm max-h-8 w-14 logo-img">
            </x-nav-link>
        </div>
        <div class="dropdown-menu dropdown-menu-end text-center h-12 mt-10" aria-labelledby="navbarDropdown">
            <a class="dropdown-item text-light-gray text-xl" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out mr-2"></i>{{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

        <form class="mt-8" method="POST" action="{{ url('/avatar/'.Auth::user()->id) }}" id="form" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center items-center">
                <div style="width: 12.4rem; height:12.4rem" class="relative z-10 flex justify-center items-center rounded-full overflow-hidden bg-gradient-to-r mx-auto from-cian to-fucsia"></div>
                <div id="profile-photo-form" class="w-48 h-48 absolute z-10 flex justify-center items-center rounded-full overflow-hidden border-8 border-dark-gray mx-auto">
                    <div class="min-h-full min-w-full flex justify-center overflow-hidden items-center rounded-full ease-in-out">
                        <img src="{{ Auth::user()->image ?? asset('img/img.png') }}" class="h-96 w-96 scale-100 object-cover" >
                        <input id="profile_image" name="profile_image" class="cursor-pointer absolute w-full h-full left-0 top-0 opacity-0 z-20"
                        title="@if(Auth::user()->image) Change your avatar @else Upload an avatar @endif" type="file"/>
                    </div>
                </div>
            </div>
            <x-button class="submit-avatar hidden">
            </x-button>
        </form>
        <div class="mt-4 text-center font-bold text-lg opacity-95">
            {{ Auth::user()->name }}
        </div>
        <div class="flex justify-center text-center opacity-75">
            @<p>{{ Auth::user()->username }}</p>
        </div>
        <p class="text-lg text-center font-light mt-14 mb-4 opacity-60">Share your code with your friends so they can build your feed</p>
        <div class="form-group bg-light-gray w-min rounded-lg mt-5 p-4 px-8 mx-auto shadow-2xl shadow-black">
            <div class="input-group input-group-copy flex items-center justify-between">
                <span class="input-group-btn">
                    <button class="btn btn-default transition duration-500 ease-in-out transform hover:scale-105"><i class="fa fa-clone mr-4"></i></button>
                </span>
                <input id="test2" type="text" readonly class="form-control text-xl bg-light-gray w-20" value="{{ Auth::user()->code }}"/>
            </div>
        </div>
    </div>

</div>

