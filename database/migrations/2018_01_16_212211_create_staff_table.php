<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
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
            $table->integer('user_id')->nullable();
            $table->string('first')->nullable();
            $table->string('second')->nullable();
            $table->string('last')->nullable();
            $table->string('fullname')->nullable();
            $table->string('address')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('em')->nullable();
            $table->string('contactn')->nullable();
            $table->string('pob')->nullable();
            $table->string('jobtitle')->nullable();
            $table->string('department')->nullable();
            $table->string('gender')->nullable();
            $table->string('profilepic')->nullable();
            $table->string('created')->nullable();
            $table->string('updated')->nullable();
            $table->string('ad')->default('0');
            $table->string('user')->nullable();
            
            $table->timestamps();

            // pag 0 enabled rest disabled
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
}
