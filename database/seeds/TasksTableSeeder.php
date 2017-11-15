<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            ['Buy clothes', 'Get some clothing', 0, null, 'not started'],
            ['Clean bathrooms', 'Scrub toilets, clean sink, rinse out tub', 1, 2, 'in progress'],
            ['Get turkey', 'Find a turkey that can feed 20 people and order', 2, null, 'completed'],
        ];

        $count = count($tasks);

        foreach ($tasks as $key => $task) {
            Task::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $task[0],
                'description' => $task[1],
                'due_date' => Carbon\Carbon::now()->subDays($count * 10)->toDateTimeString(),
                'list_id' => $task[2],
                'dependent_task_id' => $task[3],
                'status' => $task[4]
            ]);
            $count--;
        }
    }
}
