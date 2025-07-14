<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Automatically creates auto-incrementing id
            $table->string('category');
            $table->string('name');
            $table->decimal('price', 10, 2); // e.g. 99999.99 max
            $table->unsignedTinyInteger('rating'); // rating from 0–255 (or use smallInteger for -32K to +32K)
            $table->string('image');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
