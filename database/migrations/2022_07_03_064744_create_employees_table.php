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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_code',50)->unique();
            $table->string('employee_first_name',50);
            $table->string('employee_sur_name',50);
            $table->string('employee_nic',12)->unique();
            $table->date('date_of_birth');
            $table->integer('gender');
            $table->string('email',50)->unique()->nullable();
            $table->integer('contact_number');
            $table->longText('address');
            $table->date('joined_date');
            $table->date('contract_end_date')->nullable();
            $table->longText('image');
            $table->longText('description')->nullable();
            $table->integer('branch_id')->unsigned();;
            $table->integer('role_id')->unsigned();;
            $table->timestamps();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
