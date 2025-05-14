<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function showProfile($id)
    {
        // $user = User::where('name', $name)->firstOrFail();

        // if ($user->type !== $type) {
        //     abort(404); // Se o tipo não corresponder, aborta
        // }

        // if ($type == 'landlord') {
        //     $landlord = $user->landlord;
        //     $renter = null;
        // } elseif ($type == 'renter') {
        //     $renter = $user->renter;
        //     $landlord = null;
        // } else {
        //     abort(404); // Se o tipo não for nem 'landlord' nem 'renter'
        // }
        $user = User::findOrFail($id);
        $landlord = $user->landlord;
        $renter = $user->renter;

        return view('profile', compact('user', 'landlord', 'renter'));
    }

    public function showEditProfile()
    {
        // Show Profile Edit View
    }


    public function editProfile(Request $request)
    {
        // Update Profile Informations
    }

    public function deleteProfile(Request $request)
    {
        // Delete Profile
    }
}
