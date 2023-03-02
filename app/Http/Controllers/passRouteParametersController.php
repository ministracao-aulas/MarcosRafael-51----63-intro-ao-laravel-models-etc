<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Trait\FlashMessage;
use Illuminate\Support\Facades\Mail;

class passRouteParametersController extends Controller
{
    public function index()
    {
        return view('capture');
    }

    public function capture(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'string'],
            'email' => ['required', 'email:rfc,dns']
        ]);
        
        if (!isset($request)) {
            return redirect()->route('create.parameter');
        }

        $email = $request->email;
        
        $user = User::factory()->createOne([
            'name' => $request->name,
            'email' => $request->email,
            'password' => 'teste123',

        ]);

        Mail::to($email)->send(new NotifyMail($user));

        return redirect()->route('display.parameter', [...$request->all()]);
    }
    
    public function display(Request $request)
    {
        return view('display')->with(['data' => $request]);
    }
}
