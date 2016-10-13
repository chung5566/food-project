<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storerandom', function ( Blueprint $table)
        {
            $table->increments('id');            
            $table->integer('user_id')->unsigned();
            $table->integer('task_1')->unsigned();
            $table->integer('task_2')->unsigned();
            $table->integer('task_3')->unsigned();
            $table->integer('task_4')->unsigned();

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
        //
    }
}
