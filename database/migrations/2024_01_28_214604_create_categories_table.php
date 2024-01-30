<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['name' => 'Eletrônicos'],
            ['name' => 'Roupas'],
            ['name' => 'Livros'],
            ['name' => 'Jogos'],
            ['name' => 'Esportes'],
            ['name' => 'Alimentos'],
            ['name' => 'Casa e Jardim'],
            ['name' => 'Saúde e Beleza'],
            ['name' => 'Automotivo'],
            ['name' => 'Brinquedos'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
