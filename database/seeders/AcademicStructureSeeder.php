<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\University;
use Illuminate\Database\Seeder;

class AcademicStructureSeeder extends Seeder
{
    public function run(): void
    {
        $university = University::firstOrCreate(
            [
                'code' => 'MAIN-UNI',
            ],
            [
                'name' => 'Main University',
                'is_active' => true,
            ]
        );

        $faculty = Faculty::firstOrCreate(
            [
                'university_id' => $university->id,
                'code' => 'ENG-TECH',
            ],
            [
                'name' => 'Faculty of Engineering Technology',
                'is_active' => true,
            ]
        );

        $department = Department::firstOrCreate(
            [
                'faculty_id' => $faculty->id,
                'code' => 'ELEC-TECH',
            ],
            [
                'name' => 'Electrical Technology',
                'is_active' => true,
            ]
        );

        Program::firstOrCreate(
            [
                'department_id' => $department->id,
                'code' => 'BTECH-ELEC',
            ],
            [
                'name' => 'B.Tech Electrical',
                'level' => 'undergraduate',
                'accreditation_framework' => 'sydney',
                'status' => 'active',
            ]
        );
    }
}