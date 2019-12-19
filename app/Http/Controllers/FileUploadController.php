<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    static function upload($file){
        $uploadFolder = "public/upload";
        $filepath = $file->store($uploadFolder);
        return $filepath;
    }

    static function uploadSingleFile($file){
        return self::upload($file);
    }
}