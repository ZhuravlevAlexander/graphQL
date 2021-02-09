<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\{User, Project, Task};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Project::truncate();
        Task::truncate();
        DB::table('project_user')->truncate();

       $admin = User::create([
          'name' => 'SuperAdmin',
          'email' => 'admin@local',
          'password' => bcrypt('password'),
          'api_token' => Str::random(60),
       ]);

        $user1 = User::create([
            'name' => 'Alexxxx',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'api_token' => Str::random(60),
        ]);

        $proj = Project::create([
            'title' => 'Project Manager Development',
            'description' => 'Write the project manager application',
            'manager_id' => $admin->id
        ]);

        $task1 = Task::create([
            'title' => 'Seed Database',
            'description' => 'Seed the database with test data',
            'user_id' => $admin->id,
            'project_id' => $proj->id,
            'status_code' => 'COMP',
        ]);

        $task2 = Task::create([
            'title' => 'Complete Development',
            'description' => 'Write to code',
            'user_id' => $user1->id,
            'project_id' => $proj->id,
            'status_code' => 'OPEN',
        ]);

        $proj->users()->saveMany([$admin, $user1]);
    }
}
