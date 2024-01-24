<?php

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Sistema;
use App\Models\Sla;
use App\Models\Status;
use App\Models\Tag;
use App\Models\User;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users');
            $table->foreignIdFor(Cliente::class)->references('id')->on('clientes');;
            $table->foreignIdFor(Categoria::class)->references('id')->on('categorias');;
            $table->foreignIdFor(Sla::class);
            $table->foreignIdFor(Sistema::class);
            $table->foreignIdFor(Status::class);
            $table->foreignIdFor(Tag::class);
            $table->string('titulo');
            $table->integer('gcm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
