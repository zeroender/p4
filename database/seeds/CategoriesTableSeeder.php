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
            ['Default', 'The Default category'],
            ['Household Chores', 'A list of household tasks'],
            ['Holiday Shopping List', 'Stuff to buy for hosting thanksgiving and christmas shopping']
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
