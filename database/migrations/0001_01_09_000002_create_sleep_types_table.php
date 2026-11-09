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
        Schema::create('sleep_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('id_moods')->unsigned();
            $table->foreign('id_moods')->references('id')->on('moods');
            $table->smallInteger('sleep_flat')->nullable();
            $table->smallInteger('sleep_deep')->nullable();
            $table->smallInteger('sleep_rem')->nullable();
            $table->smallInteger('sleep_working')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sleep_types');

    }
};
