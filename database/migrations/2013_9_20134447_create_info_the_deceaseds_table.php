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
        Schema::create('info_the_deceaseds', function (Blueprint $table) {
            $table->id();
            $table->string('background_img')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('photo')->nullable();
            $table->string('fio')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->dateTime('dateDeath')->nullable();
            $table->dateTime('dateBirthday')->nullable();
            $table->string('coordinates')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_the_deceaseds');
    }
};