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
        Schema::create('substances_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('id_substances')->unsigned();
            $table->foreign("id_substances")->references("id")->on("substances");
            $table->bigInteger('id_groups')->unsigned();
            $table->foreign("id_groups")->references("id")->on("groups");
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('substances_groups');
     
    }
};
