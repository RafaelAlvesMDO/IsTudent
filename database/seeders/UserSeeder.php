<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Renter;
use App\Models\Landlord;
use App\Models\College;
use App\Models\Course;
use App\Models\City;
use App\Models\State;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $college = College::where('name', 'CESMAC')->first();
        $course = Course::where('name', 'Information Systems')->first();
        $city = City::where('name', 'Maceió')->first();
        $state = State::where('name', 'AL')->first();

        $landlordUser = User::create([
            'name' => 'Rafael Alves',
            'email' => 'rafaellandlord@gmail.com',
            'phone' => '5582996509774',
            'cpf' => '10669416452',
            'birth_date' => '2003-02-03',
            'password' => Hash::make('rafaellandlord'),
            'type' => 'landlord',
            'profile_image' => 'img/profile-image-default.jpg',
            'city_id' => $city->id,
            'state_id' => $state->id,
        ]);

        Landlord::create([
            'user_id' => $landlordUser->id,
            'bank_code' => '001',
            'branch' => '12345',
            'account_number' => '12345678',
            'account_type' => 'checking',
        ]);

        $renterUser = User::create([
            'name' => 'Rafael Alves',
            'email' => 'rafaelrenter@gmail.com',
            'phone' => '5582996509774',
            'cpf' => '10669416452',
            'birth_date' => '2003-02-03',
            'password' => Hash::make('rafaelrenter'),
            'type' => 'renter',
            'profile_image' => 'img/profile-image-default.jpg',
            'city_id' => $city->id,
            'state_id' => $state->id,
        ]);

        Renter::create([
            'user_id' => $renterUser->id,
            'matriculation' => '2313981409',
            'college_id' => $college->id,
            'period' => '5',
            'course_id' => $course->id,
        ]);
    }
}
