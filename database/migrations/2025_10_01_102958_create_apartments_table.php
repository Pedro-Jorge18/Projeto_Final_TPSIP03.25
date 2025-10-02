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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->OnDelete('cascade');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('state');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('double_beds')->default(0);
            $table->integer('single_beds')->default(0);
            $table->integer('both_beds')->default(0);
            $table->boolean('animal')->default(false);
            $table->timestamps();

            $table->index(['property_id']);   //o indices para buscas frequentes


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
