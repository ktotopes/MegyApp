<?php

use App\Enum\BlocksType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('deceased_id')->constrained()->cascadeOnDelete();
            $table->string('type')->default(BlocksType::Text);


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blocks');
    }
};
