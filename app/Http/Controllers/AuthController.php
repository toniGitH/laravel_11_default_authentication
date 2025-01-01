<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            return redirect()->route('index'); // If the user is authenticated, redirect to the index route
        }

        return view('auth.home');
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->registerEmail,
            'password' => Hash::make($request->registerPassword),
        ]);
        
        return to_route('home')->with('success', "User {$request->name} created successfully!!<br>Please, log in to acces the App");
    }

    public function login(LoginRequest $request)
    {
        // Get the validated data from the form request
        $credentials = $request->validated();

        // Try to authenticate the user with the provided credentials
        if (Auth::attempt([
            'email' => $credentials['loginEmail'], 
            'password' => $credentials['loginPassword']
        ], true)) {
            // Protection against session fixation attacks
            $request->session()->regenerate();

            // If the authentication is successful, redirect to the index route
            return to_route('index');
        }

        // If the authentication is not successful, check if the email exists
        $user = User::where('email', $credentials['loginEmail'])->first();

        // If the email exists but the password is incorrect
        if ($user && !Hash::check($credentials['loginPassword'], $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ], 'login'); // Specify the 'login' bag
        }

        // If the email does not exist
        return back()->withErrors([
            'email' => 'The provided email is not registered.',
        ], 'login'); // Specify the 'login' bag
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
        return to_route('home');
    }

    public function index(){
        $user = Auth::user();
        return view('dashboard.index', compact('user'));
    }
}
