<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $find = User::where('email', $data['email'])->first();
        if ($find) {
            if (Hash::check($data['password'], $find->password)) {
                Auth::attempt($data);
                return redirect()->route('dashboard');
            }else{
                // password salah
                return redirect()->back()->withInput();
            }
        }else{
            // email tidak ditemukan
            return redirect()->back()->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
        
    }
}
