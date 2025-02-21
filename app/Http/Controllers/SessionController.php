<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\ElementNode;

class SessionController extends Controller
{
    function index()
    {
        return view('auth.login');
    }
    function login(Request $request)
    {
        $loginInfo = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($loginInfo)) {
            return redirect(('/dashboard'));
        } else {
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput();
        }
    }
}
