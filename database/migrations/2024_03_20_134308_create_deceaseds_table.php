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
        Schema::create('deceaseds', function (Blueprint $table) {
            $table->id();

            $table->string('fio');
            $table->string('slug');
            $table->foreignId('info_the_deceased_id')->constrained('info_the_deceaseds')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deceaseds');
    }
};
