<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UploadFileController extends Controller
{
    public function showform(){
        return view('upload.showform');
    }
    public function handleUpload(Request $request){
        $file = $request->file('fileToUpload');
        $path = 'ahhi/kki';
       Storage::put($path,$file);
       return redirect()->route('upload-file');

    }
}
