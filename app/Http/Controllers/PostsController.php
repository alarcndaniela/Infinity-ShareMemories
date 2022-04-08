<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $auth_user = Auth::user();
            $posts = Post::where('user_id', $auth_user->id)->get();
            return view('home')->with('posts', $posts)->with('auth_user', $auth_user);
        } else
        {
            return view('home');
        }
    }

    public function friendFeed(Request $request)
    {
        try {
            $code =$request->code;
            $user = User::query()->where('code', (int)$code)->first();
            if($user->id == Auth::user()->id) {
                return view('errors.yourself');
            }
            $posts = Post::query()->where('user_id', $user->id)->get();
            return view('home')->with('posts', $posts)->with('user', $user);
        } catch (\Exception $exception) {
            return view('errors.notfound');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user)
    {
        $auth_user = Auth::user()->id;
        $user_code = User::find($user)->code;

        /*********
        MinIO
        *********/

        // resultado = feed/3/y3YIV0qxwESnA5gJHNAS9epkV8AvnvJltUqDOQ2Z.jpg
        // feed -> folder
        // 3 -> user_id
        $path = $request->file('image')->store('feed/'.$user, 's3');
        $input = $request->all();

        // la función basename() devuelve el nombre de archivo de una ruta
        $input['image'] =  basename($path);
        // crea una url del archivo
        // por ejemplo: http://minio:9000/resources/feed/3/nmOKm1K1DLvHMCxyLFd3YJY60uWekEnC63SpGz6e.jpg
        $input['url'] =  Storage::url($path);

        // se crea el post con los datos de la imagen,
        // el usuario al que se le agrega la imagen y quien la subió

        Post::create(array_merge($input, ['user_id' => $user], ['created_by' => $auth_user]));

        /*********
        MinIO
        *********/

        if($user_code == Auth::user()->code) {
            return redirect('/');
        } else {
            return redirect('/friend-feed/?code='.$user_code);
        }
    }
}
