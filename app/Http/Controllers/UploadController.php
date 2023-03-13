<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.upload');
    }

    public function store(Request $request)
    {
        $request->file('file')->store('plublic');
        return redirect()->route('upload');
    }
}
