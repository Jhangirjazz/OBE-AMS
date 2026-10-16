<?php

namespace Database\Seeders;

use App\Models\Peo;
use App\Models\Plo;
use App\Models\Program;
use Illuminate\Database\Seeder;

class ObeFrameworkSeeder extends Seeder
{
    public function run(): void
    {
        $program = Program::where('code', 'BTECH-ELEC')->firstOrFail();

        $gas = [
            ['GA1', 'Engineering Knowledge', 'Apply mathematics, science, and engineering technology knowledge to technology problems.'],
            ['GA2', 'Problem Analysis', 'Identify, formulate, and analyze complex engineering technology problems.'],
            ['GA3', 'Design/Development of Solutions', 'Design solutions for complex engineering technology problems and systems.'],
            ['GA4', 'Investigation', 'Investigate complex engineering technology problems using research and methods.'],
            ['GA5', 'Modern Tool Usage', 'Select and apply appropriate techniques, resources, and modern tools.'],
            ['GA6', 'The Technologist and Society', 'Assess societal, health, safety, legal, and cultural issues.'],
            ['GA7', 'Environment and Sustainability', 'Understand environmental and societal impact of technology solutions.'],
            ['GA8', 'Ethics', 'Apply ethical principles and professional norms.'],
            ['GA9', 'Individual and Team Work', 'Function effectively as individual and in diverse teams.'],
            ['GA10', 'Communication', 'Communicate effectively on complex engineering technology activities.'],
            ['GA11', 'Project Management and Finance', 'Apply engineering technology management and economic decision-making.'],
            ['GA12', 'Life-Long Learning', 'Recognize need for independent and life-long learning.'],
        ];

        $plos = [];

        foreach ($gas as [$code, $title, $description]) {
            $plos[$code] = Plo::firstOrCreate(
                [
                    'program_id' => $program->id,
                    'ga_code' => $code,
                ],
                [
                    'title' => $title,
                    'description' => $description,
                    'status' => 'active',
                ]
            );
        }

        $peoData = [
            [
                'PEO1',
                'Industry Problem Solvers',
                'Graduates apply engineering technology knowledge and modern tools to solve real industry problems.',
                ['GA1' => 3, 'GA2' => 3, 'GA3' => 2, 'GA5' => 3],
            ],
            [
                'PEO2',
                'Responsible Professionals',
                'Graduates practice professionally with ethics, sustainability, and societal responsibility.',
                ['GA6' => 3, 'GA7' => 3, 'GA8' => 3],
            ],
            [
                'PEO3',
                'Life-Long Leaders',
                'Graduates pursue life-long learning, teamwork, leadership, and career growth.',
                ['GA9' => 2, 'GA10' => 2, 'GA11' => 2, 'GA12' => 3],
            ],
        ];

        foreach ($peoData as [$code, $title, $description, $mapping]) {
            $peo = Peo::firstOrCreate(
                [
                    'program_id' => $program->id,
                    'code' => $code,
                ],
                [
                    'title' => $title,
                    'description' => $description,
                    'status' => 'active',
                ]
            );

            $sync = [];

            foreach ($mapping as $gaCode => $correlation) {
                $sync[$plos[$gaCode]->id] = ['correlation' => $correlation];
            }

            $peo->plos()->sync($sync);
        }
    }
}