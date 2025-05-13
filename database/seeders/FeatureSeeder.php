<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            'Fan',
            'Wi-Fi',
            'Television',
            'Air Conditioning',
            'Private Bathroom',
            'Desk',
            'Two Beds',
            'Single Bed',
            'Double Bed',
            'Curtains',
            'Wardrobe',
            'Bedside Table',
        ];

        foreach ($features as $featureName) {
            Feature::firstOrCreate(['name' => $featureName]);
        }
    }
}
