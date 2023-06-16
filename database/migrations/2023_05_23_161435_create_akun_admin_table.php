<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('akun_admin', function (Blueprint $table) {
            $table->id();
            $table->string('username', 55)->unique();
            $table->string('password', 255);
            $table->string('firstName', 55);
            $table->string('lastName', 55);
            $table->string('email', 255);
            $table->string('file');
            $table->boolean('status')->default(0); // 0 for offline, 1 for online
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('akun_admin');
    }
};
