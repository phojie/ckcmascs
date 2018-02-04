<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('idno')->nullable();
            $table->string('first')->nullable();
            $table->string('second')->nullable();
            $table->string('last')->nullable();
            $table->string('fullname')->nullable();
            $table->string('semester')->nullable();
            $table->string('pob')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('em')->nullable();
            $table->string('contactn')->nullable();
            $table->string('pad')->nullable();
            $table->string('had')->nullable();
            $table->string('ffullname')->nullable();
            $table->string('mfullname')->nullable();
            $table->string('department')->nullable();
            $table->string('sex')->nullable();
            $table->string('yearlevel')->nullable();
            $table->string('sy')->nullable();
            $table->string('lastschool')->nullable();
            $table->string('profilepic')->nullable();
            $table->string('created')->nullable();
            $table->string('updated')->nullable();
            $table->string('ad')->default('0');
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
