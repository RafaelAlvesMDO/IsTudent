<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Landlord;
use App\Models\Renter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function showLandlordForm()
    {
        return view('register-landlord');
    }

    public function showRenterForm()
    {
        return view('register-renter');
    }

    public function registerLandlord(Request $request)
    {
        $type = 'landlord';

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'digits:11'],
            'cpf' => [
                'required',
                'string',
                'digits:11',
                Rule::unique('users')->where(function ($query) use ($type) {
                    return $query->where('type', $type);
                }),
            ],
            'birth_date' => ['required', 'date'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'bank_code' => ['required', 'alpha_num', 'digits:3'],
            'branch' => ['required', 'alpha_num', 'digits:5'],
            'account_number' => ['required', 'alpha_num', 'digits:8'],
            'account_type' => ['required', 'string', 'in:checking,savings'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'password' => Hash::make($request->password),
            'type' => 'landlord',
        ]);

        Landlord::create([
            'user_id' => $user->id,
            'bank_code' => $request->bank_code,
            'branch' => $request->branch,
            'account_number' => $request->account_number,
            'account_type' => $request->account_type,
        ]);

        return redirect()->route('login-landlord')->with('success', 'User registered successfully!');
    }

    public function registerRenter(Request $request)
    {
        $type = 'renter'; // Definido diretamente

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'digits:11'],
            'cpf' => [
                'required',
                'string',
                'digits:11',
                Rule::unique('users')->where(function ($query) use ($type) {
                    return $query->where('type', $type);
                }),
            ],
            'birth_date' => ['required', 'date'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'matriculation' => ['required', 'alpha_num', 'digits_between:4,20'],
            'college' => ['required', 'string', 'max:100'],
            'period' => ['required', 'string', 'between:1,10'],
            'course' => ['required', 'string', 'max:100'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'password' => Hash::make($request->password),
            'type' => $type,
            'profile_image' => 'img/profile-image-default.jpg'
        ]);

        Renter::create([
            'user_id' => $user->id,
            'matriculation' => $request->matriculation,
            'college' => $request->college,
            'period' => $request->period,
            'course' => $request->course,
        ]);

        return redirect()->route('login-renter')->with('success', 'User registered successfully!');
    }

    // OLD VERSION

    // public function registerLandlord(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => ['required', 'string', 'max:120'],
    //         'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
    //         'phone' => ['required', 'string', 'digits:11'],
    //         'cpf' => ['required', 'string', 'digits:11', 'unique:users'],
    //         'birth_date' => ['required', 'date'],
    //         'password' => ['required', 'string', 'confirmed', 'min:8'],
    //         'bank_code' => ['required', 'alpha_num', 'digits:3'],
    //         'branch' => ['required', 'alpha_num', 'digits:5'],
    //         'account_number' => ['required', 'alpha_num', 'digits:8'],
    //         'account_type' => ['required', 'string', 'in:checking,savings'],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'cpf' => $request->cpf,
    //         'birth_date' => $request->birth_date,
    //         'password' => Hash::make($request->password),
    //         'type' => 'landlord',
    //     ]);

    //     Landlord::create([
    //         'user_id' => $user->id,
    //         'bank_code' => $request->bank_code,
    //         'branch' => $request->branch,
    //         'account_number' => $request->account_number,
    //         'account_type' => $request->account_type,
    //     ]);

    //     return redirect()->route('login')->with('success', 'User registered successfully!');
    // }


    // public function registerRenter(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => ['required', 'string', 'max:120'],
    //         'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
    //         'phone' => ['required', 'string', 'digits:11'],
    //         'cpf' => ['required', 'string', 'digits:11', 'unique:users'],
    //         'birth_date' => ['required', 'date'],
    //         'password' => ['required', 'string', 'confirmed', 'min:8'],
    //         'matriculation' => ['required', 'alpha_num', 'digits_between:4,20'],
    //         'college' => ['required', 'string', 'max:100'],
    //         'period' => ['required', 'string', 'between:1,10'],
    //         'course' => ['required', 'string', 'max:100'],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'cpf' => $request->cpf,
    //         'birth_date' => $request->birth_date,
    //         'password' => Hash::make($request->password),
    //         'type' => 'renter',
    //     ]);

    //     Renter::create([
    //         'user_id' => $user->id,
    //         'matriculation' => $request->matriculation,
    //         'college' => $request->college,
    //         'period' => $request->period,
    //         'course' => $request->course,
    //     ]);

    //     return redirect()->route('login')->with('success', 'User registered successfully!');
    // }
}
