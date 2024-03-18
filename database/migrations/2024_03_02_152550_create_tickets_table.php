<?php

use App\Models\Cliente;
use App\Models\Sistema;
use App\Models\Status;
use App\Models\Tag;
use App\Models\Urgencia;
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
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Status::class);
            $table->foreignIdFor(Sistema::class);
            $table->foreignIdFor(Urgencia::class);
            $table->foreignIdFor(User::class, 'responsavel_id');
            $table->foreignIdFor(Cliente::class);
            $table->foreignIdFor(Tag::class)->nullable();
            $table->string('titulo');
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
