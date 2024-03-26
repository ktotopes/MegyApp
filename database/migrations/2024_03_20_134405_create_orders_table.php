<?php

use App\Enum\OrderDelivery;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

            $table->bigInteger('price');
            $table->bigInteger('discountPrice');
            $table->integer('count');
            $table->string('fio');
            $table->string('email');
            $table->string('phone');
            $table->string('delivery')->default(OrderDelivery::CDEK);

            $table->string('address');
            $table->point('location');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
