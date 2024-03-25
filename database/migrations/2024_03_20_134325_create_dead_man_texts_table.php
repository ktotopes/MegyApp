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
        Schema::create('dead_man_texts', function (Blueprint $table) {
            $table->id();

            $table->text('text');
            $table->integer('block_number')->nullable();
            $table->integer('textable_id');
            $table->string('textable_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dead_man_texts');
    }
};
