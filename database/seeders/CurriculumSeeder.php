<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Program;
use App\Models\Semester;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    public function run(): void
    {
        $program = Program::where('code', 'BTECH-ELEC')->firstOrFail();

        $batch = Batch::firstOrCreate(
            ['program_id' => $program->id, 'name' => '2023-2027'],
            ['start_year' => 2023, 'end_year' => 2027, 'status' => 'active']
        );

        Semester::firstOrCreate(
            ['program_id' => $program->id, 'name' => 'Semester 1'],
            ['batch_id' => $batch->id, 'sequence' => 1, 'status' => 'active']
        );

        Semester::firstOrCreate(
            ['program_id' => $program->id, 'name' => 'Semester 2'],
            ['batch_id' => $batch->id, 'sequence' => 2, 'status' => 'active']
        );

        Course::firstOrCreate(
            ['program_id' => $program->id, 'code' => 'ETC-101'],
            ['title' => 'Circuit Analysis', 'credit_hours' => 3, 'theory_hours' => 3, 'lab_hours' => 0, 'category' => 'core', 'semester_no' => 1, 'status' => 'active']
        );

        Course::firstOrCreate(
            ['program_id' => $program->id, 'code' => 'ETC-102'],
            ['title' => 'Electrical Workshop', 'credit_hours' => 1, 'theory_hours' => 0, 'lab_hours' => 2, 'category' => 'lab', 'semester_no' => 1, 'status' => 'active']
        );

        Course::firstOrCreate(
            ['program_id' => $program->id, 'code' => 'ETC-201'],
            ['title' => 'Digital Logic Design', 'credit_hours' => 3, 'theory_hours' => 2, 'lab_hours' => 2, 'category' => 'core', 'semester_no' => 2, 'status' => 'active']
        );
    }
}