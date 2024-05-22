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
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('age');
            $table->string('professional_title')->nullable();
            $table->string('languages')->nullable();
            $table->string('skills')->nullable();
            $table->decimal('expirience', 10, 2)->nullable();
            $table->decimal('current_salary', 10, 2)->nullable();
            $table->string('educaton')->nullable();
            $table->string('about')->nullable();
            $table->string('responsibilities')->nullable();
            $table->string('social_medias')->nullable();
            $table->decimal('expected_salary', 10, 2)->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('full_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};
