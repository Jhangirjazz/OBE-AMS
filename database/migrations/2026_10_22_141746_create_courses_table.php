<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->string('code');
            $table->string('title');
            $table->decimal('credit_hours', 4, 1)->default(0);
            $table->unsignedTinyInteger('theory_hours')->default(0);
            $table->unsignedTinyInteger('lab_hours')->default(0);
            $table->string('category')->default('core');
            $table->unsignedTinyInteger('semester_no')->nullable();
            $table->string('outline_path')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();

            $table->unique(['program_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};