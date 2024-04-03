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
        Schema::create('Manufacturer', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name", 32);
            $table->string("slug", 32);
            $table->string("image", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Product', function (Blueprint $table) {
            $table->dropForeign(['manufacturerId']);
        });
        Schema::dropIfExists('Manufacturer');
    }
};