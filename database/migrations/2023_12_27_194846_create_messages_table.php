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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thread_id');
            $table->string('matricno');
            $table->longText('body');
            $table->softDeletes('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('thread_id')->references('id')->on('threads')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('matricno')->references('matricno')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
