<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trait\FlashMessage;

class passRouteParametersController extends Controller
{
    public function capture(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3']
        ]);
        
        if (!isset($request->name)) {
            return redirect()->route('create.parameter');
        }
        return redirect()->route('display.parameter', [...$request->all()]);
    }
    
    public function display(Request $request)
    {
        return view('display')->with(['data' => $request]);
    }
}
