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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('matricno')->unique();
            $table->string('organization');
            $table->string('country');
            $table->string('address');
            $table->string('service_type');
            $table->string('request_method');
            $table->string('status')->default('PENDING');
            $table->string('payment')->default('UNPAID');
            $table->timestamps();
        });
        
        Schema::table('service_requests', function (Blueprint $table) {
            $table->foreign('matricno')->references('matricno')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
