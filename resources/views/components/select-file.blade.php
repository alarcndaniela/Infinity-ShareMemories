<form class="lg:mt-12 lg:ml-4" method="POST" action="{!! url('/friend-feed/upload/'.$user) !!}" id="feed-form" enctype="multipart/form-data">
    @csrf
    <div class="flex items-center justify-center my-8">
        <div class="file-input text-base lg:text-lg">
            <input type="file" id="file" class="file" name="image" accept="image/png, image/gif, image/jpeg">
            <label class="text-center w-max p-4 text-white font-bold bg-gradient-to-r from-cian to-dark-cian
            hover:bg-green shadow-xl shadow-cian/30 rounded-lg transition duration-500 ease-in-out transform hover:scale-105"  for="file">
            <i class="fa fa-plus mr-2"></i> Create a new post
            </label>
        </div>
    </div>
</form>
