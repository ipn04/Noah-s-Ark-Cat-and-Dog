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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('breed');
            $table->integer('age');
            $table->string('color');
            $table->string('adoption_status');
            $table->string('gender');
            $table->string('vaccination_status');
            $table->decimal('weight');
            $table->string('size');
            $table->text('behaviour');
            $table->text('description');
            $table->text('dropzone_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
