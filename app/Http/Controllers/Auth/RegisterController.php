<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Landlord;
use App\Models\Renter;
use App\Models\College;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegister($name)
    {
        $user = User::where('name', $name)
            ->with('landlord', 'renter')
            ->firstOrFail();

        return view('register', compact('user'));
    }

    public function showLandlordForm()
    {
        $cities = City::orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('register-landlord', compact('cities', 'states'));
    }

    public function showRenterForm()
    {
        $courses = Course::orderBy('name')->get();
        $colleges = College::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $states = State::orderBy('name')->get();

        return view('register-renter', compact('courses', 'colleges', 'cities', 'states'));
    }

    public function registerLandlord(Request $request)
    {
        $type = 'landlord';

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'digits:13'],
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
            'city_id' => ['required', 'exists:cities,id'],
            'state_id' => ['required', 'exists:states,id'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cpf' => $validated['cpf'],
            'birth_date' => $validated['birth_date'],
            'password' => Hash::make($request->password),
            'type' => $type,
            'profile_image' => 'img/profile-image-default.jpg',
            'city_id' => $validated['city_id'],
            'state_id' => $validated['state_id'],
        ]);

        Landlord::create([
            'user_id' => $user->id,
            'bank_code' => $validated['bank_code'],
            'branch' => $validated['branch'],
            'account_number' => $validated['account_number'],
            'account_type' => $validated['account_type'],
        ]);

        return redirect()->route('login-landlord')->with('success', 'User registered successfully!');
    }

    public function registerRenter(Request $request)
    {
        $type = 'renter'; // Definido diretamente

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone' => ['required', 'string', 'digits:13'],
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
            'college_id' => ['required', 'exists:colleges,id'],
            'period' => ['required', 'string', 'between:1,10'],
            'course_id' => ['required', 'exists:courses,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'state_id' => ['required', 'exists:states,id'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cpf' => $validated['cpf'],
            'birth_date' => $validated['birth_date'],
            'password' => Hash::make($validated['password']),
            'type' => $type,
            'profile_image' => 'img/profile-image-default.jpg',
            'city_id' => $validated['city_id'],
            'state_id' => $validated['state_id'],
        ]);

        Renter::create([
            'user_id' => $user->id,
            'matriculation' => $validated['matriculation'],
            'college_id' => $validated['college_id'],
            'period' => $validated['period'],
            'course_id' => $validated['course_id'],
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
