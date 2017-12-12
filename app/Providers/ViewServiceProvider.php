<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Category;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @return void
     */
    public function boot()
    {
        # The * indicates this view composer will be available to all views
        view()->composer(['modules.nav'], function ($view) {

            $categories = Category::orderBy('name')->get();

            $categoryNav = [
                'category' => 'All Categories',
                'SECTIONBREAK' => 'SECTIONBREAK'
            ];

            $taskByCategoryNav = [];

            foreach ($categories as $category) {
                $categoryNav+= array('category/'.$category->id => $category->name);
                $taskByCategoryNav+= array('category/'.$category->id.'/tasks' => $category->name);
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

            $view->with([
                'categories' => $categories,
                'createNav' => $createNav,
                'taskNav' => $taskNav,
                'categoryNav' => $categoryNav,
                'taskByCategoryNav' => $taskByCategoryNav
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
