<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        //redirect user based on admin or executive
        if (Auth::attempt($credentials)) {
            return redirect()->route('notes');
        } else {
            return redirect()->back()->with('danger', 'Emel atau kata laluan tidak tepat');
        }
    }

    public function registerPage() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);
        return redirect()->route('notes');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
