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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners');
            $table->decimal('value_diary', 8, 2);
            $table->string('district');
            $table->string('advice');
            $table->string('prop_type');
            $table->boolean('animal');
            $table->string('description');
            $table->boolean('reserved');
            $table->timestamps();

            $table->index(['owner_id']);    //para filtrar pelo propietario
            $table->index(['value_diary']); //para filtrar por preço
            $table->index(['district']);   //para filtrar por estado
            $table->index(['reserved']);    //para filtrar por reserva
            $table->index(['district', 'value_diary']);   //busca Por distrito e Valor diario
            $table->index(['prop_type', 'reserved']);    //busca por tipo de imovel e se estar reservado
            $table->index(['animal', 'value_diary']);  // busca se pode animal e valor

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
