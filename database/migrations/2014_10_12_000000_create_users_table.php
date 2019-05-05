<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            
            $table->string('student_id')->nullable();
            $table->string('batch')->nullable();
            
            $table->string('cell')->nullable();
            $table->string('skills')->nullable();
            $table->integer('role')->unsigned()->default(3);
            $table->string('img')->nullable();
            $table->string('cv')->nullable();
            
            $table->date('admission_date')->nullable();
            $table->date('graduate_date')->nullable();
            
            $table->date('job_join_date')->nullable();
            $table->date('job_end_date')->nullable();
            $table->string('position')->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
