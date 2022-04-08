@auth
<div>
    <form class="w-full flex justify-center" action="{{ url('friend-feed/') }}" method="GET">
        <x-icon-input class="mx-8 lg:mx-auto lg:w-4/12 sm:w-96 shadow-2xl shadow-dark-gray" value="{{ old('code') }}" name="code" id="code" type="text" :icon="'fa fa-search text-gray-300 left-5 top-8 lg:top-11 absolute'"
        placeholder="{{ __('Search your friends with their code')}}"/>
    </form>
</div>

<div class="mx-0 lg:mx-10">
    @if( request()->route()->uri == '/')
        <div class="flex flex-col lg:flex-row  items-center">
            <h2 class="text-xl lg:text-2xl text-white font-bold mt-12">Your feed built by your friends</h2>
            <x-select-file user="{{$auth_user->id}}"></x-select-file>
        </div>
    @else
        <div class="flex flex-col lg:flex-row  items-center">
            <h2 class="text-xl lg:text-2xl text-white font-bold mt-12">Your friend's feed</h2>
            <x-select-file user="{{$user->id}}"></x-select-file>
        </div>
    @endif
    <div class="gap-8 lg:columns-3 sm:columns-1 h-max">
        @forelse ($posts as $post)
            <div class="m-2 break-inside">
                <div class="flex h-max flex-col" data-aos="slide-up" data-aos-duration="2000">
                    <a class="cursor-pointer transition duration-500 ease-in-out transform hover:scale-105" target="_blank" href="{{$post->url}}">
                        <img src="{{$post->url}}" class="rounded-3xl object-cover h-full w-full shadow-lg">
                    </a>
                    <div class="flex h-20 items-center">
                        <div class="relative flex justify-center items-center">
                            <div style="width: 1.9rem; height:1.9rem" class="relative z-10 flex justify-center items-center rounded-full overflow-hidden bg-gradient-to-r mx-auto from-cian to-fucsia"></div>
                            <div id="profile-photo-form" class="w-7 h-7 absolute z-10 flex justify-center items-center rounded-full overflow-hidden border-2 border-dark-gray mx-auto">
                                <div class="min-h-full min-w-full flex justify-center overflow-hidden items-center rounded-full ease-in-out">
                                    <img src="{{ App\Models\User::find($post->created_by)->image }}" class="h-12 w-12 scale-100 object-cover" >
                                    <input id="profile_image" name="profile_image" class="cursor-pointer absolute w-full h-full left-0 top-0 opacity-0 z-20" type="file"/>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-start text-white-traslucid text-left ml-3">
                            Uploaded by @<p>{{ App\Models\User::find($post->created_by)->username }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="inline-flex lg:w-max mt-56 text-center">
                @if(request()->route()->uri == '/' )
                    <p class="text-center font-light mt-16 mb-4 text-white-traslucid opacity-25 text-xl lg:text-2xl">
                        Your feed is empty, share your code with your friends so they can upload new photos :D
                    </p>
                @else
                <div>
                    <p class="text-center flex flex-col font-light mt-16 mb-4 text-white-traslucid opacity-25 text-xl lg:text-2xl">
                        Your friend's feed is empty, upload your memories with him/her :D
                    </p>
                </div>
                @endif
            </div>
        @endforelse
    </div>
</div>
@endauth
