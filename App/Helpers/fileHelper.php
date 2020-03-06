<?php

use Illuminate\Http\Request;

if(!function_exists('upload_image')){
    function upload_file(Request $request, $fileLocation)
    {
        $f = $request->file('file');
        $fileExtension = $f->getClientOriginalExtension(); //jpeg 
        $fileName = md5(time() . rand()); //234234ASDF234asdf2
        $fileName .= "." . $fileExtension;

        if (!file_exists(storage_path($fileLocation))) {
            mkdir(storage_path($fileLocation), 0777, true);
        }
        $f->move(storage_path($fileLocation) . DIRECTORY_SEPARATOR, $fileName);
        return $fileName;
    }

}