<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $categories = Category::orderBy('name')->get();

        $categoriesForCheckboxes = [];

        foreach ($categories as $category) {
            $categoriesForCheckboxes[$category['id']] = $category->name;
        }

        return $categoriesForCheckboxes;
    }

    public static function getTasksForCategory($id)
    {
        $category = Category::where('id', '=', $id);

        foreach ($category->tasks as $task) {
            dump($task->name);
        }
    }
}
