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
        Schema::create('moods_actions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('id_moods')->unsigned();
            $table->foreign('id_moods')->references('id')->on('moods');
            $table->bigInteger('id_actions')->unsigned();
            $table->foreign('id_actions')->references('id')->on('actions');
            $table->smallInteger('percent_executing')->unsigned()->nullable();
            $table->integer('minute_exe')->unsigned()->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moods_actions');

    }
};
