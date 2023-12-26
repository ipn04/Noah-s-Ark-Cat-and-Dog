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
        Schema::create('adoption', function (Blueprint $table) {
            $table->id();
            $table->string('social_media');
            $table->string('occupation');
            $table->string('alternate_contact');
            $table->string('relation');
            $table->string('relationship');
            $table->string('f_question');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption');
    }
};
