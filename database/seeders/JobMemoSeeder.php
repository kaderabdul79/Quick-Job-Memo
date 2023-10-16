<?php

namespace Database\Seeders;

use App\Models\JobMemo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobMemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // if user has then create, since jobmemo dependent on user table the
        $user = User::where('email', 'kader@gmail.com')->first();

        if ($user) {
            JobMemo::create([
                'user_id' => $user->id,
                'job_title' => 'Demo Job 1',
                'deadline' => now()->addDays(7),
                'experience' => '2-3 years',
                'tech_stack' => 'PHP, Laravel, Vue.js',
                'location' => 'Nikunja',
                'interview_called' => false,
                'interview_attended' => false,
            ]);

            JobMemo::create([
                'user_id' => $user->id,
                'job_title' => 'Demo Job 2',
                'deadline' => now()->addDays(14),
                'experience' => '3-5 years',
                'tech_stack' => 'React, Node.js',
                'location' => 'Uttara',
                'interview_called' => true,
                'interview_attended' => false,
            ]);
        }
    }
}
