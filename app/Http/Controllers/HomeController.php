<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use UploadImage;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function UpdateProfile(Request $request){
        $request = $request->all();
        Auth::user()->name = $request['name'];
        Auth::user()->email = $request['email'];
        $image = $request['avatar'];
        $name = $this->uploadImage($image);
        Auth::user()->avatar = $name;
        Auth::user()->save();
        return redirect()->route('profile');
    }
}
