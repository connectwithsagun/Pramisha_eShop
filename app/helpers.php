<?php
use Intervention\Image\Facades\Image;

if(!function_exists('image_crop')){
    function image_crop( $image_name, $width = 300, $height = 450 ){
        if(
            file_exists(storage_path('app/public/images/'.$image_name)) && 
            !file_exists(storage_path('app/public/images/thumbnail/'.$image_name))
        ){
            $image_resize = Image::make(storage_path('app/public/images/'.$image_name));
            
            $image_resize->resize($width, $height);
            $image_resize->save(storage_path('app/public/images/thumbnail/'.$image_name));
        } 
        return asset('storage/images/thumbnail/'.$image_name);
    }
}

