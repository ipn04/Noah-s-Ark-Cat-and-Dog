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
            $table->foreignId('adoption_id')->constrained('adoption')->onDelete('cascade');
            $table->json('answers');
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
