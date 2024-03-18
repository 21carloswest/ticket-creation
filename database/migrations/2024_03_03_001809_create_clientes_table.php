<?php

use App\Models\Sistema;
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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sistema::class);
            $table->string('cliente_nome')->nullable();
            $table->string('empresa');
            $table->string('email');
            $table->string('telefone');
            $table->string('celular');
            $table->string('link')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('codigo_cliente')->nullable();
            $table->boolean('ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
