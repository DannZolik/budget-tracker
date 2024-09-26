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
        Schema::dropIfExists(('expenses'));
        Schema::create('expenses', function (Blueprint $table) {
    
            $table->id();
            $table->string('name', length:255);
            $table->text('description')->nullable();
            $table->integer('category_id')->nullable();
            $table->float('sum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
