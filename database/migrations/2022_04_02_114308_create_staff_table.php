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
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('passport');
            $table->string('staff_id');
            $table->string('gender');
            $table->string('department');
            $table->date('date_of_birth');
            $table->date('next_reminder');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('appointment_token');
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
        Schema::dropIfExists('staff');
    }
};
