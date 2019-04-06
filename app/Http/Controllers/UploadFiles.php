<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UploadFiles extends Controller
{
    //
    public function save(Request $request)
    {

        $path = Storage::putFile('image', $request->file('avatar'), 'public');
        //$path = Storage::disk('local')->put('image', $request->file('avatar'));
        return $path;
    }

    public function show(Request $request)
    {


        $file = Storage::get('public/avatars/'.request()->image);     //The filename is stored in a database.
        return response($file, 200)->header('Content-Type', 'image/jpeg');

        return $path;
    }

}
