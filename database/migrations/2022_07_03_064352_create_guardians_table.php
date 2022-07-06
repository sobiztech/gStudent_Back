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
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guardian_code',50)->unique();
            $table->string('guardian_name',50);
            $table->string('guardian_nic',12)->unique();
            $table->string('guardian_contact_number',50);
            $table->longText('description')->nullable();
            $table->integer('guardian_type_id')->unsigned();
            $table->timestamps();
            $table->foreign('guardian_type_id')->references('id')->on('guardian_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardians');
    }
};
