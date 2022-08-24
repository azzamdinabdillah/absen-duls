<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $user = new User();
    }

    public function index()
    {
        $data = [
            'title' => 'Login Home',
        ];

        return view('login/index', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register Home'
        ];

        return view('login/register', $data);
    }

    public function registerSystem(Request $request)
    {
        $validation = $request->validate([
            'password' => 'required',
            'username' => 'required|unique:users,name',
            'email' => 'required|email:dns',
        ]);

        // if($validation){
        //     return redirect()->back();
        // }

        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $passwordHash = Hash::make($password);

        User::create([
            'name' => $username,
            'email' => $email,
            'password' => $passwordHash,
        ]);

        return redirect()->to('/register')->with('berhasil', 'Registrasi Berhasil Silahkan Login');
    }

    public function authenticate(Request $request)
    {   
        // $username = $request->username;
        // $password = $request->password;

        // $checkUsername = DB::table('users')->where('name', $username)->first();
        // // $checkUsername = User::where('name', $username)->original()->first();
        // $checkPassword = DB::table('users')->where('password', $password)->first();

        // $checkPasswordhash = Hash::check($checkPassword, $checkPassword);

        // if($checkUsername && $checkPasswordhash){
        //     return "login berhasil username dan pw benar";
        // }else{
        //     return 'login gagal username dan pw salah';
        // }

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // dd($credentials);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return redirect()->back()->with('gagal', 'Login Gagal, Cek Email Dan Password Anda');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->to('/');
    }
}
