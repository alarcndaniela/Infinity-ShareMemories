<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function store(ProfileRequest $request, $id)
    {
        $values = $request->all();
        $path = $request->profile_image->store('avatars/'.$id, 's3');
        $values['image'] = Storage::url($path);
        User::find($id)->update($values);

        return redirect('/');
    }
}
