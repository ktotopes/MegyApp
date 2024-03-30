<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deceaseds', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('background_img')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('photo')->nullable();
            $table->string('fio')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->dateTime('date_death')->nullable();
            $table->dateTime('date_birthday')->nullable();
            $table->string('coordinates')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('info_the_deceaseds');
    }
};
