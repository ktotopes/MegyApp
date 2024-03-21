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

            $table->string('photo')->nullable();
            $table->string('title');
            $table->dateTime('dateDeath');
            $table->dateTime('dateBirthday');
            $table->text('description');
            $table->string('coordinates');

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
