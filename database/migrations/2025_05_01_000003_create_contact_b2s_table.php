<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactB2sTable extends Migration
{
    public function up()
    {
        Schema::create('contact_b2s', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('city');
            $table->date('birth_date');
            $table->json('module');
            $table->foreignId('test_id')->constrained('limit_b2s')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_b2s');
    }
}
