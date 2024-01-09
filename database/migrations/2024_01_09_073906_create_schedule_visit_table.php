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
        Schema::create('schedule_visit', function (Blueprint $table) {
            $table->id('visit_id');
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('user_id')->constrained('users');
            $table->date('date');
            $table->time('time');
            $table->string('concern');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_visit');
    }
};
