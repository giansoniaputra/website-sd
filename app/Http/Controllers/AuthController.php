<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        // Title for the login page
        $pageTitle = 'Login - SDIT Al-Mukrom';

        // Return view with title
        return view('auth.login', compact('pageTitle'));
    }

    public function authenticate(Request $request)
    {
        // VALIDASI INPUTAN LOGIN
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Email tidak valid!',
            'password.required' => 'Password tidak boleh kosong!'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // JIKA LOGIN SUKSES ARAHKAN KE ROUTE /
            return redirect()->intended('/');
        }

        return back()->with('error', 'Email/Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth');
    }

    public function register()
    {
        // Title for the register page
        $pageTitle = 'Daftar - SDIT Al-Mukrom';

        return view('auth.register', ['pageTitle' => $pageTitle, 'users' => User::all()]);
    }

    public function create()
    {
        // Title for the create user page
        $pageTitle = 'Buat User - SDIT Al-Mukrom';

        return view('auth.create', compact('pageTitle'));
    }

    // REGISTRASI USER
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:7|max:255',
            'role' => 'required|max:255'
        ]);

        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->uuid = Str::orderedUuid();
        $user->save();
        return redirect('/auth/register')->with('message', 'Registrasi Berhasil');
    }

    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        // Title for the edit user page
        $pageTitle = 'Edit User - SDIT Al-Mukrom ' . $user->name;

        return view('auth.edit', compact('pageTitle', 'user'));
    }

    // UPDATE DATA USER
    public function update(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        $rules = [
            'name' => 'required',
            'role' => 'required',
        ];
        $cekUserEmail = User::where('email', $request->email)->first();
        if ($cekUserEmail && $cekUserEmail->email == $user->email) {
            $rules['email'] = 'required|email';
        } else {
            $rules['email'] = 'required|email|unique:users';
        }
        if ($request->password) {
            $rules['password'] = 'min:7';
        }

        $request->validate($rules);

        $user->fill($request->all());
        if ($request->password != null || $request->password != '') {
            $user->password =  Hash::make($request->password);
        } else {
            $user2 = User::where('uuid', $uuid)->first();
            $user->password = $user2->password;
        }

        $user->save();
        return redirect('/auth/register')->with('message', 'Data User Berhasil Diubah');
    }

    public function delete($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        User::destroy($user->id);
        return redirect('/auth/register')->with('message', 'Data User Berhasil Dihapus');
    }
}
