<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slut')->unique();
            $table->string('subject');
            $table->integer('status_id')->unsigned();
            $table->integer('status_id')->references('id')->on('statuses');
            $table->integer('priority_id')->unsigned();
            $table->integer('priority_id')->references('id')->on('priorities');;
            $table->integer('user_id')->unsigned();
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('project_id')->unsigned();
            $table->integer('project_id')->references('id')->on('projects');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
