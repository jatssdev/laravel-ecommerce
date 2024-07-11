<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    function add(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('user.login');
    }
    function login(Request $request)
    {
        $check = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if ($check) {
            $request->session()->put('user', Auth::user());
            return redirect()->route('user.home');
        } else {
            return redirect()->back()->with('error', 'invalid credentialsI');
        }

    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('user.login');

    }
}
