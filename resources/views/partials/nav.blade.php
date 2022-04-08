
<nav id="nav" tabindex="0" aria-label="Menú de navegación principal del sitio web Kudos" role="navigation"
class="flex-row md:justify-between bg-black px-5 lg:py-5">
    <div class="columns-2">
        <ul class="flex justify-start items-center lg:flex lg:flex-row" >
            <li class="nav-item m-3 text-light-gray">
                <x-nav-link tabindex="0" aria-label="Ir a inicio" class="logo-link" title="Ir a inicio." href="{{ url('/') }}">
                    <img src="{{ asset('img/Vector.svg') }}" alt="" class="max-w-sm max-h-8 w-14 logo-img">
                </x-nav-link>
            </li>
        </ul>
        <ul class="flex justify-end items-center lg:flex lg:flex-row" >
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item m-3 text-light-gray">
                        <x-nav-link class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</x-nav-link>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item m-3 text-light-gray">
                            <x-nav-link class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</x-nav-link>
                    </li>
                @endif
            @else
                <li class="nav-item m-3 text-light-gray dropdown">
                    <x-nav-link id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                    </x-nav-link>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <x-nav-link class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </x-nav-link>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<style>
    .active{
        display: block;
    }
</style>
<script src="{{ asset('js/nav.js') }}"></script>
