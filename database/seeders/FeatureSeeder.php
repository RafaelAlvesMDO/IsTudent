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
            'Air Conditioning',
            'Wi-Fi',
            'Washing machine',
            'TV',
            'Single bed',
            'Parking spot'
        ];

        foreach ($features as $featureName) {
            Feature::firstOrCreate(['name' => $featureName]);
        }
    }
}
