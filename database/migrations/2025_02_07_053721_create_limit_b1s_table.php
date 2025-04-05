<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitB1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limit_b1s', function (Blueprint $table) {
            $table->id();
            $table->date('end_date')->nullable(); // Tugash sanasi
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
        Schema::dropIfExists('limit_b1s');
    }
}