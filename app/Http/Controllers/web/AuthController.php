<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;


class AuthController extends Controller
{
    public function LoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('frontend.auth.login');
    }

    public function showFormRegister()
    {

        return view('frontend.auth.register');
    }

    public function authenticate(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // dd($username, $password);

        Auth::attempt(['username' => $username, 'password' => $password]);
        if (Auth::check()) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        FacadesSession::flash('error', 'Username atau password salah');
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->level = $request->level;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->level = 2;
        try {
            $user->save();
            return redirect()->route('login');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e,
            ], 500);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
