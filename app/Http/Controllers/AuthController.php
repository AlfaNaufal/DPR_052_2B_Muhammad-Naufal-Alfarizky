<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view("auth.login");
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        
            if (Auth::user()->role === 'Admin') {
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    // public function login(Request $request){

    //     $request->validate([
    //     'username'=>'required',
    //     'password'=>'required'
    //     ]);

    //     $user = Pengguna::where('username', '=', $request->username)->first();

    //     if($user){
    //         if(Hash::check($request->password, $user->password)){
    //             $request->session()->put('loginId', $user->user_id);
    //             return redirect('dashboard');
    //         }else{
    //             return back()->with('fail', 'Password Salah');
                
    //         }
    //     }else{
    //         return back()->with('fail', 'Akun Tidak Ada');

    //     }

    // }


    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
