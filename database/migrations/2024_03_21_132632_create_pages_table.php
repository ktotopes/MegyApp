<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('page')->nullable();
            $table->json('data')->nullable();
            $table->string('bg_image_banner_1')->nullable();
            $table->string('qr_code_image_banner_1')->nullable();
            $table->string('video_review_2')->nullable();
            $table->string('image_description_3')->nullable();
            $table->string('image_description_4')->nullable();
            $table->string('image_description_5')->nullable();
            $table->string('image_description_6')->nullable();
            $table->string('image_banner_2_1')->nullable();
            $table->string('qr_code_banner_1_1')->nullable();
            $table->string('image_banner_3_1')->nullable();
            $table->string('qr_code_banner_2_1')->nullable();
            $table->string('image_banner_1_1')->nullable();
            $table->string('image_banner_2_2')->nullable();
            $table->string('image_banner_3_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
