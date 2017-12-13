<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slut')->unique();
            $table->text('description')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('status_id')->unsigned();
            $table->integer('status_id')->references('id')->on('statuses');
            $table->integer('priority_id')->unsigned();
            $table->integer('priority_id')->references('id')->on('priorities');
            $table->string('resolution',80);
            $table->integer('type_id')->unsigned();
            $table->integer('type_id')->references('id')->on('types');
            $table->integer('assignee')->unsigned();
            $table->integer('assignee')->references('id')->on('users');
            $table->integer('manager')->unsigned();
            $table->integer('manager')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
}
