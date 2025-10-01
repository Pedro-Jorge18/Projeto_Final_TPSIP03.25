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
        Schema::create('favorites', function (Blueprint $table) {

            $table->foreignId('client_id')->constrained('clients')->OnDelete('cascade');
            $table->foreignId('property_id')->constrained('properties')->ondelete('cascade');
            $table->timestamps();
            $table->primary(['client_id', 'property_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
