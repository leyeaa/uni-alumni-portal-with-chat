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
        Schema::create('alumni_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('matricno')->unique();
            $table->string('surname');
            $table->string('other_names');
            $table->string('phone');
            $table->string('position');
            $table->string('employer');
            $table->string('address');
            $table->string('profile_picture');
            $table->string('department');
            $table->integer('graduation_month');
            $table->integer('graduation_year');
            $table->timestamps();
        });

        Schema::table('alumni_profiles', function (Blueprint $table) {
            $table->foreign('matricno')->references('matricno')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_profiles');
    }
};
