<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $filename = $request->file('upload')->storeAs('images', str_replace(' ', '-', $request->file('upload')->getClientOriginalName()), 'public_disk');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/'.$filename); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
