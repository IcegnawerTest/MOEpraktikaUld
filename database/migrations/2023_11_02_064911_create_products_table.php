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
        Schema::create('Products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name', 100);
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('img', 100);
            $table->string('description', 5000);
            $table->string('composition', 500);
            $table->decimal('price', 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Products');
    }
};
