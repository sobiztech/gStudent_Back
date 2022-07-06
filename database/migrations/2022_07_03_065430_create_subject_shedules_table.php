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
        Schema::create('subject_shedules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_time');
            $table->time('duration');
            $table->longText('description')->nullable();
            $table->integer('class_subject_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->timestamps();
            $table->foreign('class_subject_id')->references('id')->on('classes_subjects')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_shedules');
    }
};
