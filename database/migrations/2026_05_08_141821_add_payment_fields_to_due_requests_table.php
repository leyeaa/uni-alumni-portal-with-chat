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
       Schema::table('due_requests', function (Blueprint $table) {

    $table->string('gateway_response')->nullable();

    $table->string('currency')->nullable();

    $table->string('channel')->nullable();

    $table->timestamp('paid_at')->nullable();

    $table->string('customer_email')->nullable();

    $table->string('authorization_code')->nullable();

    $table->string('card_type')->nullable();

    $table->string('bank')->nullable();

    $table->string('last4')->nullable();

    $table->decimal('fees', 12, 2)->nullable();

    $table->string('ip_address')->nullable();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('due_requests', function (Blueprint $table) {
            //
        });
    }
};
