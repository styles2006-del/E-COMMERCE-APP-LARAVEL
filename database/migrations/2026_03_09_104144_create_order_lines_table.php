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
        Schema::create('order_lines', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('article_id')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('amount');
            $table->timestamps();

            //contrainte
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('set null');

            // contrainte niveau table
            $table->primary('order_id','article_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_lines');
    }
};
