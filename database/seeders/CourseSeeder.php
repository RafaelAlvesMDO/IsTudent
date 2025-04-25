<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $courses = [
            'Computer Science',
            'Medicine',
            'Law',
            'Engineering',
            'Psychology',
            'Business Administration',
            'Nursing',
            'Pedagogy',
            'Marketing',
            'Accounting',
            'Linguistics',
            'Information Systems',
            'Design',
            'Dentistry',
            'Physical Education',
        ];

        foreach ($courses as $courseName) {
            Course::firstOrCreate(['name' => $courseName]);
        }
    }
}
