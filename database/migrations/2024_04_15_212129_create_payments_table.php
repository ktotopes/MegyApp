<?php

use App\Enum\PaymentStatus;
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

            $table->string('status')->default(PaymentStatus::Pending);
            $table->decimal('amount')->nullable();
            $table->string('currency')->nullable();
            $table->text('description')->nullable();
            $table->boolean('test')->default(false);
            $table->boolean('paid')->default(false);
            $table->boolean('refundable')->default(false);

            $table->json('metadata')->nullable();
            $table->json('payment_method')->nullable();
            $table->json('authorization_details')->nullable();
            $table->json('confirmation')->nullable();


            $table->dateTime('expires_at')->nullable();
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
