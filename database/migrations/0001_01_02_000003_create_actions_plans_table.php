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
        Schema::create('action_plans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->foreign("id_users")->references("id")->on("users");
            $table->bigInteger('id_actions')->unsigned();
            $table->foreign("id_actions")->references("id")->on("actions");
            $table->dateTime('date')->nullable();
            $table->integer('long')->nullable();
            $table->text('what_work')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_plans');
     
    }
};
