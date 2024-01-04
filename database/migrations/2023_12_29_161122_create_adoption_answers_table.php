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
        Schema::create('adoption_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adoption_id')->constrained('adoption');
            $table->string('first_question');
            $table->string('second_question');
            $table->string('third_question');
            $table->string('fourth_question');
            $table->string('fifth_question');
            $table->string('sixth_question');
            $table->string('sevent_question');
            $table->string('eight_question');
            $table->string('ninth_question');
            $table->string('tenth_question');
            $table->string('eleventh_question');
            $table->string('twelfth_question');
            $table->string('thirteenth_question');
            $table->string('fourteenth_question');
            $table->string('fifteenth_question');
            $table->string('seventeenth_question');
            $table->string('eighteenth_question');
            $table->string('nineteenth_question');
            $table->string('twentieth_question');
            $table->string('twentyfirst_question');
            $table->string('twentysecond_question');
            $table->string('twentythird_question');
            $table->string('upload');
            $table->string('upload2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_answers');
    }
};
