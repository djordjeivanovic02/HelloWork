<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            // Prvo uklonimo postojeće spoljašnje ključeve
            $table->dropForeign(['user_id']);
            $table->dropForeign(['ad_id']);

            // Sada ih ponovo dodamo bez onDelete('cascade')
            $table->foreign('user_id')
                ->references('id')->on('users'); // Ovdje izostavljamo onDelete('cascade')
            $table->foreign('ad_id')
                ->references('id')->on('ads'); // Ovdje izostavljamo onDelete('cascade')
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            // Prvo uklonimo nove spoljašnje ključeve
            $table->dropForeign(['user_id']);
            $table->dropForeign(['ad_id']);

            // Vratimo stare spoljašnje ključeve sa onDelete('cascade')
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ad_id')
                ->references('id')->on('ads')->onDelete('cascade');
        });
    }
};
