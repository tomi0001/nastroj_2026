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
        Schema::create('users_descriptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('id_usees')->unsigned();
            $table->foreign('id_usees')->references('id')->on('usees');
            $table->bigInteger('id_descriptions')->unsigned();
            $table->foreign('id_descriptions')->references('id')->on('descriptions');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_descriptions');

    }
};
