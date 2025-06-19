<?php

namespace App\Http\Controllers;

use App\Constants\ViewName;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view(ViewName::REGISTER);
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Auto login setelah register, atau redirect ke login
        auth()->login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }
}
