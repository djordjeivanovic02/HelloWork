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
        Schema::table('ads', function (Blueprint $table) {
            $table->text('responsibilities')->change();
            $table->text('experience')->change();
            $table->text('tabs')->change();
            $table->text('description')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->string('responsibilities', 255)->change();
            $table->string('experience', 255)->change();
            $table->string('tabs', 255)->change();
            $table->string('description', 255)->change();
        });
    }
};
