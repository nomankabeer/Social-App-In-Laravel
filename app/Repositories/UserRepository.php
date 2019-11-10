<?php

namespace App\Repositories;
use App\Http\Controllers\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;
class UserRepository
{
    use UploadImage;
    public function updateUserProfileData($request){
        Auth::user()->name = $request['name'];
        Auth::user()->email = $request['email'];
        $image = $request['avatar'];
        $name = $this->uploadImage($image);
        Auth::user()->avatar = $name;
        Auth::user()->save();
        return "success";
    }
}
