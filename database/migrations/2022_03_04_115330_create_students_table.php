<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('university')->nullable();
            $table->string('college')->nullable();
            $table->integer('college_level')->nullable();
            $table->integer('points')->default(0);
            $table->string('password');
            $table->string('pin_code')->nullable();
            $table->string('device_token')->nullable();
            $table->tinyInteger('is_login')->default(0);
            $table->integer('login_attempts')->default(0);
            $table->enum('status', array('pending', 'active', 'deactivate'))->default('active');
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
        Schema::dropIfExists('students');
    }
}
