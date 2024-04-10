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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
        });

        Schema::create('productCartRelation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->references('id')->on('carts');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('productCartRelation', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
        });

        Schema::dropIfExists('productCartRelation');
        Schema::dropIfExists('carts');
    }
};
