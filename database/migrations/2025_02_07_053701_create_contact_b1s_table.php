<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactB1sTable extends Migration
{
    public function up()
    {
        Schema::create('contact_b1s', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('city');
            $table->json('module'); // Change to JSON type
            $table->date('birth_date');
            $table->foreignId('test_id')->constrained('limit_b1s')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_b1s');
    }
}