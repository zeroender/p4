<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['Pet', 'Tasks related to a pet'],
            ['Household Chores', 'A list of household tasks'],
            ['Holiday Preperation', 'Things related to the holidays'],
            ['Food Shopping', 'Tasks to get food'],
            ['Work Related', 'Tasks related to work']
        ];

        $count = count($categories);

        foreach ($categories as $key => $category) {
            Category::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $category[0],
                'description' => $category[1]
            ]);
            $count--;
        }
    }
}
