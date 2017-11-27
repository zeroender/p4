<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
* Task
*/
# Create a task
Route::get('/task/create', 'TaskController@create');
Route::post('/task', 'TaskController@store');

# Edit a task
Route::get('/task/{id}/edit', 'TaskController@edit');
Route::put('/task/{id}', 'TaskController@update');

# View all tasks
Route::get('/task', 'TaskController@index');

# View a task
Route::get('/task/{id}', 'TaskController@show');

# Delete a task
Route::get('/task/{id}/delete', 'TaskController@confirmDelete');
Route::delete('/task/{id}', 'TaskController@delete');

/**
* Category
*/
# Create a category
Route::get('/category/create', 'CategoryController@create');
Route::post('/category', 'CategoryController@store');

# Edit a category
Route::get('/category/{id}/edit', 'CategoryController@edit');
Route::put('/category/{id}', 'CategoryController@update');

# View all categories
Route::get('/category', 'CategoryController@index');

# View a category
Route::get('/category/{id}', 'CategoryController@show');

# Delete a category
Route::get('/category/{id}/delete', 'CategoryController@delete');
Route::delete('/category/{id}', 'CategoryController@destroy');

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
