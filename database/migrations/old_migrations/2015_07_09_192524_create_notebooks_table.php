<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price');
            $table->string('display');
            $table->string('processor');
            $table->string('ram');
            $table->string('video_card');
           /* $table->integer('network_adapters')->unsigned();*/
            $table->integer('os')->unsigned();
            $table->string('battery');
            $table->integer('size')->unsigned();
            $table->string('color');
            $table->string('warranty');
            $table->text('description');
            $table->timestamps();


            $table->foreign('os')
                  ->references('id')
                  ->on('operation_systems')
                  ->onDelete('no action');


            $table->foreign('size')
                  ->references('id')
                  ->on('sizes')
                  ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notebooks');
    }
}
