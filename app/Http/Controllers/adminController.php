<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|',
        ]);

        // Retrieve the admin by email and plain text password
        $admin = Admin::where([['email', $request->email], ['password', $request->password]])->first();

        // Check if the admin exists
        if ($admin) {
            // Store the admin details in the session
            $request->session()->put('admin', $admin);

            // Redirect to the admin dashboard
            return redirect('/admin');
        } else {
            // Redirect back to the login page with an error message
            return redirect('/admin/login')->with('error', 'Login failed!');
        }
    }

    function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect()->back();
    }
}
