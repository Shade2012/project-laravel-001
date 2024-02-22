<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(){
        return view('register.index',[
            "title" => "Register",
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|min:5|max:255"
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        $existingNis = User::where('email',$validateData['email'])->first();
        User::create($validateData);
        $request->session()->flash('success','Register Berhasil,silahkan login');
        return redirect('/login/index');
        }

    public function login(){
            return view('login.index', [
                "title" => "Login",
                "user" => "Guest",
            ]);       
    }
    
    public function loginPost(Request $request){
        $credentials = [
            'email'=> $request->email,
            'password'=>$request->password
        ];
    
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard/student/all')->with('success', 'login berhasil');
        }
    
        return back()->with('error', 'email atau password salah');
    }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/home')->with('success', 'You have been logged out.');
    }
}
