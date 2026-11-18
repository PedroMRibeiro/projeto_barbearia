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
        $workingDays = config('workdays.days');

        Schema::create('schedules', function (Blueprint $table) use ($workingDays) {
            $table->id();
            $table->unsignedBigInteger('barber_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('working_day', $workingDays); // Restrict to specific days
            $table->timestamps();

            $table->foreign('barber_id')->references('id')->on('barbers')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
