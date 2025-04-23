<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function showLandlordLogin()
    {
        return view('login-landlord');
    }

    public function showRenterLogin()
    {
        return view('login-renter');
    }

    public function loginLandlord(Request $request)
    {

        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $request->email)
            ->where('type', 'landlord')
            ->first();


        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home')->with('success', 'Logged successfully!');
        } else {
            return back()->withErrors(['login_error' => 'Incorret E-mail or Password.'])->withInput();
        }
    }

    public function loginRenter(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $request->email)
            ->where('type', 'renter')
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home')->with('success', 'Logged successfully!');
        } else {
            return back()->withErrors(['login_error' => 'Incorret E-mail or Password.'])->withInput();
        }
    }
}
