<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\College;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = [
            'UFAL',
            'CESMAC',
            'UNIMA',
            'Estácio',
            'UNINASSAU',
            'UNCISAL',
            'UNEAL',
            'FACIMA',
            'FAN',
            'FIC UNIFAL',
        ];

        foreach ($colleges as $collegeName) {
            College::firstOrCreate(['name' => $collegeName]);
        }
    }
}
