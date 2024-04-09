<?php
namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UploadImage
{
    public function upload($folder,Request $request)
    {
        if (!$request->hasFile("img")) {
            return;
        }
        $file = $request->file("img");
        $path = $file->store($folder, "public");
        return $path;
    }
    public static function getCookie()
    {
        $cookie_id=Cookie::get("reservation_id");
        if(!$cookie_id){
            $cookie_id=Str::uuid();
            Cookie::queue("reservation_id",$cookie_id,60*24*30);
        }
        return $cookie_id;
    }
}
