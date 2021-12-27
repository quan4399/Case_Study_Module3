<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->username;
        $password = $request->password;

        $data = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role == "0") {
                return redirect()->route('dashboard');
            }
            return redirect()->route('home');
        } else {
            Session::flash('errorLogin', 'sai tk or mat khau');
            return redirect()->route('FormLogin');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function formRegister()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = '1';
        $user->save();
        return redirect()->route('FormLogin');
    }
}
