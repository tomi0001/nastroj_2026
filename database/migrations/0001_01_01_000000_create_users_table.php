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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('start_day')->default(0)->nullable();
            $table->float('level_mood_10', 6, 2)->nullable();
            $table->float('level_mood_9', 6, 2)->nullable();
            $table->float('level_mood_8', 6, 2)->nullable();
            $table->float('level_mood_7', 6, 2)->nullable();
            $table->float('level_mood_6', 6, 2)->nullable();
            $table->float('level_mood_5', 6, 2)->nullable();
            $table->float('level_mood_4', 6, 2)->nullable();
            $table->float('level_mood_3', 6, 2)->nullable();
            $table->float('level_mood_2', 6, 2)->nullable();
            $table->float('level_mood_1', 6, 2)->nullable();
            $table->float('level_mood0', 6, 2)->nullable();
            $table->float('level_mood1', 6, 2)->nullable();
            $table->float('level_mood2', 6, 2)->nullable();
            $table->float('level_mood3', 6, 2)->nullable();
            $table->float('level_mood4', 6, 2)->nullable();
            $table->float('level_mood5', 6, 2)->nullable();
            $table->float('level_mood6', 6, 2)->nullable();
            $table->float('level_mood7', 6, 2)->nullable();
            $table->float('level_mood8', 6, 2)->nullable();
            $table->float('level_mood9', 6, 2)->nullable();
            $table->float('level_mood10', 6, 2)->nullable();
            $table->string('css', 500)->default('default_css');
            $table->string('css_color', 500)->default('light_color');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
