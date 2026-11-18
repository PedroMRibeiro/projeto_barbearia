<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('surname'); 
            $table->string('contact'); 
            $table->unsignedBigInteger('availability_id'); 
            $table->unsignedBigInteger('service_id'); 
            $table->unsignedBigInteger('barber_id'); 
            $table->timestamps(); 

            $table->foreign('availability_id')->references('id')->on('availabilities');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('barber_id')->references('id')->on('barbers');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
