<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_name', 100);
            $table->integer('case_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('assigned_id')->unsigned()->index();
            $table->string('status', 100);
            $table->foreign('case_id')->references('id')->on('cases');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('assigned_id')->references('id')->on('users');
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
        Schema::drop('tickets');
    }
}
