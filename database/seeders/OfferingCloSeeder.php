<?php

namespace Database\Seeders;

use App\Models\Clo;
use App\Models\Course;
use App\Models\CourseOffering;
use App\Models\Plo;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Database\Seeder;

class OfferingCloSeeder extends Seeder
{
    public function run(): void
    {
        $course = Course::where('code', 'ETC-101')->firstOrFail();
        $semester = Semester::where('name', 'Semester 1')->firstOrFail();
        $teacher = User::query()->orderBy('id')->first();

        $offering = CourseOffering::firstOrCreate(
            [
                'course_id' => $course->id,
                'semester_id' => $semester->id,
                'section' => 'A',
            ],
            [
                'instructor_id' => $teacher?->id,
                'status' => 'active',
            ]
        );

        $plos = Plo::where('program_id', $course->program_id)
            ->get()
            ->keyBy('ga_code');

        $cloData = [
            ['CLO1', 'Explain basic circuit laws and network theorems.', 'cognitive', 'C2', 60, ['GA1' => 3, 'GA2' => 2]],
            ['CLO2', 'Solve DC and AC circuits using analysis techniques.', 'cognitive', 'C3', 60, ['GA1' => 2, 'GA2' => 3]],
            ['CLO3', 'Perform circuit experiments and use modern tools.', 'psychomotor', 'P3', 70, ['GA4' => 2, 'GA5' => 3]],
        ];

        foreach ($cloData as [$code, $description, $domain, $level, $target, $mapping]) {
            $clo = Clo::firstOrCreate(
                [
                    'course_offering_id' => $offering->id,
                    'code' => $code,
                ],
                [
                    'description' => $description,
                    'bloom_domain' => $domain,
                    'bloom_level' => $level,
                    'target_percent' => $target,
                    'approval_status' => 'approved',
                ]
            );

            $sync = [];

            foreach ($mapping as $ga => $correlation) {
                if (isset($plos[$ga])) {
                    $sync[$plos[$ga]->id] = ['correlation' => $correlation];
                }
            }

            $clo->plos()->sync($sync);
        }
    }
}