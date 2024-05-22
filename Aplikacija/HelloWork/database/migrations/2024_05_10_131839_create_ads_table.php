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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('job_type')->nullable();
            $table->unsignedInteger('min_salary')->nullable();
            $table->unsignedInteger('max_salary')->nullable();
            $table->unsignedInteger('job_category')->nullable();
            $table->string('responsibilities')->nullable();
            $table->string('experience')->nullable();
            $table->string('skills')->nullable();
            $table->unsignedInteger('working_time')->nullable();
            $table->unsignedBigInteger('number_of_jobs_needed')->nullable();
            $table->unsignedInteger('payment_method')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('ad_duration')->nullable();
            $table->string('tabs')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
