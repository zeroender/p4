<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Category;
use Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.master'], function ($view) {

            $user = Auth::user();

            if ($user) {
                $categories = $user->categories()->orderBy('name')->get();
            }

            $categoryNav = [
                'category' => 'All Categories',
                'SECTIONBREAK' => 'SECTIONBREAK'
            ];

            $taskByCategoryNav = [];

            if (isset($categories) and $categories->isNotEmpty()) {
                $taskByCategoryNav = [];

                foreach ($categories as $category) {
                    $categoryNav+= array('category/'.$category->id => $category->name);
                    $taskByCategoryNav+= array('category/'.$category->id.'/tasks' => $category->name);
                }
            } else {
                $categoryNav+= array('category/create' => "You do not have any collections - click here to create one");
                $taskByCategoryNav+= array('category/create' => "You do not have any collections -
                  click here to create one");
                $categories = [];
            }


            $createNav = [
                'task/create' => 'Create a new task',
                'category/create' => 'Create a new category'
            ];

            $taskNav = [
                'task' => 'View all Tasks',
                'SECTIONBREAK' => 'SECTIONBREAK',
                'taskBy/name' => 'View by Name',
                'taskBy/description' => 'View by Description',
                'taskBy/due_date' => 'View by Date',
                'taskBy/status' => 'View by Status'
            ];

            $loginNav = [
                'register' => 'Register',
                'login' => 'Login',
            ];

            $view->with([
                'categories' => $categories,
                'createNav' => $createNav,
                'taskNav' => $taskNav,
                'categoryNav' => $categoryNav,
                'taskByCategoryNav' => $taskByCategoryNav,
                'user' => $user,
                'loginNav' => $loginNav
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
