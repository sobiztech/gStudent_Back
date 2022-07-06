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
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teacher_code',50)->unique();
            $table->string('teacher_first_name',50);
            $table->string('teacher_sur_name',50);
            $table->string('teacher_nic',12)->unique();
            $table->date('date_of_birth');
            $table->integer('gender');
            $table->string('email',50)->unique();
            $table->integer('contact_number');
            $table->longText('address');
            $table->date('joined_date');
            $table->date('contract_end_date')->nullable();
            $table->longText('image');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
