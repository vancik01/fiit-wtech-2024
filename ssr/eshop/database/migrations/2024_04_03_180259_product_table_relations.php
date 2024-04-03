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
        Schema::table('Product', function (Blueprint $table) {
            $table->foreign('categoryId')->references('id')->on('Category');
            $table->foreign('manufacturerId')->references('id')->on('Manufacturer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
