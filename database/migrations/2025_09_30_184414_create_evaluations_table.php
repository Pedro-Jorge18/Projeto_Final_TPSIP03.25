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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('client_id')->constrained('clients');
            $table->integer('evaluation');
            $table->string('description')->nullable();
            $table->date('date');
            $table->timestamps();

            $table->index(['property_id']);        // avaliações de uma propriedade
            $table->index(['client_id']);          // avaliações de um cliente
            $table->index(['evaluation']);       // filtrar por nota
            $table->index(['date']);                //por data
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
