<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function getForCheckboxes($user)
    {
        $categories = $user->categories()->orderBy('name')->get();

        $categoriesForCheckboxes = [];

        foreach ($categories as $category) {
            $categoriesForCheckboxes[$category['id']] = $category->name;
        }

        return $categoriesForCheckboxes;
    }
}
