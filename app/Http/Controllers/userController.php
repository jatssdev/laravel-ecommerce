<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public function add(Request $request)
    {
        // Validate the request data, including the avatar image
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|', // Adjusted minimum length
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow image upload but not required
        ]);

        // Handle the avatar upload if provided
        $avatarUrl = null;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('public/images/users'); // Store in 'storage/app/public/images/users'
            $avatarUrl = Storage::url($avatarPath);
        }

        // Create the user with the provided data
        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'avatar' => $avatarUrl,
            ]);

            // Redirect to the login page with success message
            return redirect()->route('user.login')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            // Handle the error and redirect back with an error message and old input
            return redirect()->back()->withErrors(['error' => 'Failed to create user: ' . $e->getMessage()])->withInput();
        }
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
