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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->references('id')
                ->on('categories')
                ->constrained('categories');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->constrained('users');
            $table->string('name', 250);
            $table->string('slug', 250);
            $table->string('cost', 250);
            $table->string('description', 255);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
