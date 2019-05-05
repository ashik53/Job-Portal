<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment_body');
            $table->bigInteger('job_id')->unsigned();
            $table->bigInteger('owner_id')->unsigned();

            $table->foreign('job_id')->references('id')->on('jobs')->unsigned()->onDelete("cascade");
            $table->foreign('owner_id')->references('id')->on('users')->unsigned()->onDelete("cascade");
            //$table->foreign('owner_id')->references('id')->on('users')->unsigned();

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
        Schema::dropIfExists('comments');
    }
}
