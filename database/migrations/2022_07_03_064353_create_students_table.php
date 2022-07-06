<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_code',50)->unique();
            $table->string('student_first_name',50);
            $table->string('student_sur_name',50);
            $table->string('student_nic',12)->unique()->nullable();
            $table->date('date_of_birth');
            $table->integer('gender');
            $table->string('email',50)->unique()->nullable();
            $table->integer('contact_number')->nullable();
            $table->longText('address');
            $table->date('joined_date');
            $table->longText('image');
            $table->longText('description')->nullable();
            $table->integer('branch_id')->unsigned();
            $table->timestamps();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
