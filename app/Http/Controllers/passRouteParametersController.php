<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class passRouteParametersController extends Controller
{
    public function exibir(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3']
        ]);
        
        $data = $request;
        return view('display')->with(['data' => $data]);;
    }
}
