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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('phone_number'); 
            $table->string('profile_image');
            $table->string('province'); 
            $table->string('city'); 
            $table->string('street'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('profile_image');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('street');
        });
    }
};
