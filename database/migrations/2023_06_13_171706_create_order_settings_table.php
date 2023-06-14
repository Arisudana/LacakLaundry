<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql')->create('order_settings', function (Blueprint $table) {

            $table->increments('id');
            $table->string('description');
            $table->integer('value');
        });

        DB::connection('mysql')->table('order_settings')->insert([
            ['id' => 1, 'description' => 'Overdue Day', 'value' => 3],
            ['id' => 2, 'description' => 'Cuci Basah', 'value' => 3000],
            ['id' => 3, 'description' => 'Cuci Kering', 'value' => 4000],
            ['id' => 4, 'description' => 'Cuci Kering Setrika', 'value' => 5000],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_settings');
    }
};
