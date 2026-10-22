<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_offering_id')->constrained()->cascadeOnDelete();
            $table->string('code');
            $table->text('description');
            $table->string('bloom_domain')->default('cognitive');
            $table->string('bloom_level')->default('C2');
            $table->unsignedTinyInteger('target_percent')->default(60);
            $table->string('approval_status')->default('pending');
            $table->timestamps();

            $table->unique(['course_offering_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clos');
    }
};