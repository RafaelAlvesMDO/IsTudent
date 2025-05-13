<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function showProfile($name)
    {
        $user = User::where('name', $name)
            ->with('landlord', 'renter')
            ->firstOrFail();

        return view('profile', compact('user'));
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
