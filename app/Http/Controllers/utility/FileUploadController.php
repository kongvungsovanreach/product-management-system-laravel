<?php

namespace App\Http\Controllers\utility;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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