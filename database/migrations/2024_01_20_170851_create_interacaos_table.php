<?php

use App\Models\Ticket;
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
        Schema::create('interacaos', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->foreignIdFor(Ticket::class)->references('id')->on('tickets');;
            $table->foreignIdFor(User::class)->references('id')->on('users');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interacaos');
    }
};
