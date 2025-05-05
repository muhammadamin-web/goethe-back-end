<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitA2sTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limit_a2s', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Test nomi
            $table->datetime('start_date'); // Boshlanish sanasi va vaqti
            $table->datetime('end_date')->nullable(); // Tugash sanasi va vaqti
            $table->integer('max_submissions')->nullable(); // Maksimal murojaatlar soni
            $table->timestamps(); // Yaratuvchi va yangilanish vaqtlarini saqlash
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limit_a2s');
    }
}