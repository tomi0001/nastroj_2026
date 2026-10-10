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
        Schema::create('descriptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->datetime('date');
            $table->text('description');
            $table->bigInteger('id_users')->unsigned();
            $table->foreign("id_users")->references("id")->on("users");
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descriptions');
     
    }
};
