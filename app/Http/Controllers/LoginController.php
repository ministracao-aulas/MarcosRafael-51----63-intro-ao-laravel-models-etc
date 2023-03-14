<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * function form
     *
     * @param Request $request
     * @return View
     */
    public function form(Request $request): View
    {
        return view('auth.login');
    }

    /**
     * function handleForm
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function handleForm(Request $request) //: RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt(
            $request->only(['email', 'password']),
            $request->boolean('remember')
        )) {
            dd('Invalid user or password');

            return back()->withInput()->exceptInput('password')->with([
                'error' => 'Invalid user or password'
            ]);
        }

        return redirect()->route('profile');
    }

    /**
     * function profileHome
     *
     * @param Request $request
     * @return View
     */
    public function profileHome(Request $request): View
    {
        return view('auth.profile');
    }

    /**
     * function logout
     *
     * @param Request $request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
