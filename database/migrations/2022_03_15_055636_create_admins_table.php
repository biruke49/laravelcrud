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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->string('Phone');
            $table->string('Email')->unique();
            $table->string('Sex');
            $table->string('Username')->unique();
            $table->string('Password');
            $table->tinyInteger('Status')->default(0);
            $table->integer('Created_by')->unsigned();
            //$table->foreign('Created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
