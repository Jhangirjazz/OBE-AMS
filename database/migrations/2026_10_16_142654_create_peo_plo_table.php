<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peo_plo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peo_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plo_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('correlation')->default(1);
            $table->timestamps();

            $table->unique(['peo_id', 'plo_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peo_plo');
    }
};