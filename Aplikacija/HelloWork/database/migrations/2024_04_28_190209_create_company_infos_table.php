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
        Schema::create('company_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('logo')->nullable(); //ima
            $table->string('size')->nullable(); //ima
            $table->string('country')->nullable(); //ima
            $table->string('city')->nullable(); //ima
            $table->string('address')->nullable(); //ima
            $table->text('about')->nullable(); //ima
            $table->date('start_date')->nullable(); //ima
            $table->string('contact')->nullable(); //ima
            $table->string('website')->nullable(); //ima
            $table->text('links')->nullable(); //ima
            $table->string('category')->nullable(); //ima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_infos');
    }
};
