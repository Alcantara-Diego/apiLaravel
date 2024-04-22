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
        Schema::create('crud_usuarios', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('curso');
            $table->string('status');
            $table->string('telefone');
            $table->json('notas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crud_usuarios');
    }
};
