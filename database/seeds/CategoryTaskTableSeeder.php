<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Task;

class CategoryTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            'Buy clothes' => ['Holiday Preperation', 'Work Related'],
            'Clean bathrooms' => ['Household Chores', 'Holiday Preperation'],
            'Get turkey' => ['Food Shopping', 'Holiday Preperation']
        ];

        foreach ($tasks as $name => $categories) {
            $task = Task::where('name', 'like', $name)->first();

            foreach ($categories as $categoryName) {
                $category = Category::where('name', 'LIKE', $categoryName)->first();
                $task->categories()->save($category);
            }
        }
    }
}
