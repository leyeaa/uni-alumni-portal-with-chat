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
        Schema::table('alumni_profiles', function (Blueprint $table) {
            //
            $table->after('graduation_year', function($table){
                $table->longText('brief_profile')->nullable();
                $table->string('linkedin')->nullable();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumni_profiles', function (Blueprint $table) {
            //
            $table->dropColumn('brief_profile');
            $table->dropColumn('linkedin');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
        });
    }
};
