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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->string('uid')->unique();

            $table->string('account_id')->nullable();
            $table->string('gateway_id')->nullable();

            $table->string('status')->default(\App\Enum\PaymentStatus::pending->value);
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('description')->nullable();
            $table->boolean('test')->default(false);
            $table->boolean('paid');
            $table->boolean('refundable');

            $table->json('metadata')->nullable();
            $table->json('payment_method')->nullable();
            $table->json('authorization_details')->nullable();
            $table->json('confirmation')->nullable();


            $table->string('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
