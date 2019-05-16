<?php
namespace App\Http\Controllers\Traits;
Trait UploadImage {
    public function uploadImage($image){
        $name = time().$image->getClientOriginalExtension();
        $image->move(public_path('/images') , $name);
        return $name;
    }
}