<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function login(Request $request)
    {
        $admin = admin::where('email', $request->email)->Where('password', $request->password)->first();
        if ($admin) {
            $request->session()->put('admin', $admin);
            return redirect('/admin');
        } else {
            return redirect('/admin/login');
        }
    }
    function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect()->back();
    }
}
