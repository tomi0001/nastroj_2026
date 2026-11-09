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
        Schema::create('usees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->float('portion')->unsigned();
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->bigInteger('id_products')->unsigned();
            $table->foreign('id_products')->references('id')->on('products');
            $table->datetime('date');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usees');

    }
};
