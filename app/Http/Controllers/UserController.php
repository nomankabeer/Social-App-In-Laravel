<?php

namespace App\Http\Controllers;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
class UserController extends Controller
{
     protected $userRepository = null;
     public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
     }
     public function updateProfileView(){
         return view('update_profile');
     }
    public function updateUserProfile(Request $request){
        $this->userRepository->updateUserProfileData($request->all());
        return redirect()->route('profile');
    }
}
