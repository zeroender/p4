<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_task', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            # FKs for task and category
            $table->integer('category_id')->unsigned();
            $table->integer('task_id')->unsigned();

            #foreign keys
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_task');
    }
}
