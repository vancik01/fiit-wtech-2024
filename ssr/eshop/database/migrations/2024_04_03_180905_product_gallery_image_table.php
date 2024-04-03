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
        Schema::create('GalleryImage', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("imageURL", 255);
            $table->uuid("productId");
            $table->timestamps();

            $table->foreign('productId')->references('id')->on('Product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GalleryImage');
    }
};
