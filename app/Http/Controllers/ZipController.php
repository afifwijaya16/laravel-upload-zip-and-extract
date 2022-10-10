<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

class ZipController extends Controller
{
    function zipUploadForm(Request $request)
    {
        return view("unzip");
    }
    function extractUploadedZip(Request $request)
    {
        $zip = new ZipArchive();
        $status = $zip->open($request->file("zip")->getRealPath());
        if ($status !== true) {
            throw new \Exception($status);
        }
        else{
            $zip->extractTo('assets/app/uploads/unzip/game');
            $zip->close();
            return back()->with('success','You have successfully extracted zip.');
        }
    }
}
