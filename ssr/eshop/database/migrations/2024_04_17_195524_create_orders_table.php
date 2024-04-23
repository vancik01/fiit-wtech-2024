<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('street');
            $table->string('num');
            $table->string('city');
            $table->string('zip');
            $table->string('shipping_type_id');
            $table->string('payment_type');
            $table->decimal('price', 8, 2);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}