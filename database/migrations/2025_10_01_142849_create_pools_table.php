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
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->OnDelete('cascade');
            $table->boolean('covered')->default(false);
            $table->boolean('heated')->default(false);
            $table->timestamps();


            $table->index(['property_id']);   //o indices para buscas frequentes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pools');
    }
};
