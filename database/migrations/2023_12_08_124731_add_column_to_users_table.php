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
            $table->string('firstname');
            $table->string('gender');  
            $table->date('birthday')->nullable();
            $table->string('civil_status');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');
            $table->string('street');
            $table->string('phone_number'); 
            $table->string('profile_image');
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('gender');
            $table->dropColumn('birthday');
            $table->dropColumn('civil_status');
            $table->dropColumn('city');
            $table->dropColumn('barangay');
            $table->dropColumn('street');
            $table->dropColumn('phone_number');
            $table->dropColumn('profile_image');
        });
    }
};
