<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function createLogin() {
        return view('auth.login');
    }
    
    public function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ]);
        // dd($validated);

        $user = User::where('email', $validated['email'])->first();

        if($user && password_verify($validated['password'], $user->password)){
            // login success
            Auth::login($user);

            return redirect()->route('dashboard');
        }
        else{
            return back()->withErrors(['password' => 'Invalid password'])->withInput();
        }
        
    }

    
    public function createRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // dd($validated);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'author',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function logout(Request $request) {
        // dd($request->all());
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function user() {
        return view('auth.user');
    }


}
