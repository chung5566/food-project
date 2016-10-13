<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function ( Blueprint $table)
        {
            $table->increments('id');            
            $table->integer('user_id')->unsigned();
            $table->string('school_name');
            $table->string('img_url');
            $table->text('intro');
            $table->string('address');
            $table->integer('money');
            $table->string('ingredient');
            $table->string('warnning');

            

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
