<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\User;
use App\Models\Landlord;
use App\Models\Course;
use App\Models\City;
use App\Models\State;
use App\Models\Feature;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = Course::where('name', 'Information Systems')->first();
        $user = User::where('name', 'Rafael Alves')->where('type', 'landlord')->first();
        $landlord = Landlord::where('user_id', $user->id)->first();
        $city = City::where('name', 'Maceió')->first();
        $state = State::where('name', 'AL')->first();

        $roomDefault = Room::create([
            'title' => 'Room Serraria',
            'address' => 'Recanto da Serraria',
            'description' => 'Mobilied Room',
            'monthly_price' => 300.0,
            'availability_start' => '2026-06-01',
            'availability_end' => '2026-12-01',
            'rules' => 'No Smoking / No Alcohool / No Loud Volumes past 21h',
            'course_id' => $course->id,
            'image' => 'rooms-img/Room-Image-Serraria.jpg',
            'landlord_id' => $landlord->id,
            'city_id' => $city->id,
            'state_id' => $state->id,
            'status' => Room::STATUS_AVAILABLE,
        ]);

        $wifi = Feature::where('name', 'Wi-Fi')->first();
        $air = Feature::where('name', 'Air Conditioning')->first();
        $desk = Feature::where('name', 'Desk')->first();
        $fan = Feature::where('name', 'Fan')->first();
        $twobeds = Feature::where('name', 'Two Beds')->first();
        $curtains = Feature::where('name', 'Curtains')->first();
        $wardrobe = Feature::where('name', 'Wardrobe')->first();

        $roomDefault->features()->attach([
            $wifi->id,
            $air->id,
            $desk->id,
            $fan->id,
            $twobeds->id,
            $curtains->id,
            $wardrobe->id
        ]);
    }
}
