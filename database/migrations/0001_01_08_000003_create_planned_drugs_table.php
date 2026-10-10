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
        Schema::create('planned_drugs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->foreign("id_users")->references("id")->on("users");
            $table->string('name');
            $table->bigInteger('id_products')->unsigned();
            $table->foreign("id_products")->references("id")->on("products");
            $table->float('portion')->unsigned();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planned_drugs');
     
    }
};
