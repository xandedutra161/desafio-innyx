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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // i. Nome (Máximo de 50 caracteres)
            $table->string('name', 50);

            // ii. Descrição (Máximo de 200 caracteres)
            $table->string('description', 200);

            // iii. Preço (Valor positivo, double)
            $table->double('price', 8, 2); // Ajuste a precisão conforme necessário

            // iv. Data de validade (Não pode ser anterior à data atual)
            $table->date('expiration_date')->nullable();

            // v. Imagem (upload de imagem, nome único do arquivo)
            $table->string('image')->unique();

            // vi. Categoria relacionada
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps(); // Adiciona created_at e updated_at automaticamente
        });

        DB::table('products')->insert([
            [
                'name' => 'Smartphone Avançado X',
                'description' => 'Um smartphone de última geração com recursos avançados.',
                'price' => 899.99,
                'expiration_date' => '2024-12-31',
                'image' => 'smartphone_x.jpg',
                'category_id' => 1, // Substitua pelo ID da categoria de Eletrônicos
            ],
            [
                'name' => 'Sapato Esportivo Y',
                'description' => 'Um sapato esportivo confortável e moderno para atividades físicas.',
                'price' => 59.99,
                'expiration_date' => '2025-06-30',
                'image' => 'sapato_esportivo_y.jpg',
                'category_id' => 2, // Substitua pelo ID da categoria de Calçados
            ],
            [
                'name' => 'Livro "Aventuras Fantásticas"',
                'description' => 'Um emocionante livro de aventuras para leitores de todas as idades.',
                'price' => 19.99,
                'expiration_date' => '2023-12-31',
                'image' => 'livro_aventuras.jpg',
                'category_id' => 3, // Substitua pelo ID da categoria de Livros
            ],
            [
                'name' => 'Console de Jogos Z',
                'description' => 'Um console de jogos poderoso para uma experiência de jogo imersiva.',
                'price' => 499.99,
                'expiration_date' => '2024-10-31',
                'image' => 'console_z.jpg',
                'category_id' => 4, // Substitua pelo ID da categoria de Jogos
            ],
            [
                'name' => 'Equipamento de Exercício em Casa',
                'description' => 'Um conjunto de equipamentos para treino em casa, ideal para manter a forma.',
                'price' => 249.99,
                'expiration_date' => '2025-02-28',
                'image' => 'equipamento_exercicio.jpg',
                'category_id' => 5, // Substitua pelo ID da categoria de Fitness
            ],
            [
                'name' => 'Cesta de Frutas Variadas',
                'description' => 'Uma seleção fresca e deliciosa de frutas para uma alimentação saudável.',
                'price' => 39.99,
                'expiration_date' => '2024-09-30',
                'image' => 'cesta_frutas.jpg',
                'category_id' => 6, // Substitua pelo ID da categoria de Alimentos
            ],
            [
                'name' => 'Jogo de Panelas Premium',
                'description' => 'Um conjunto elegante de panelas para aprimorar suas habilidades culinárias.',
                'price' => 129.99,
                'expiration_date' => '2025-04-30',
                'image' => 'panelas_premium.jpg',
                'category_id' => 7, // Substitua pelo ID da categoria de Cozinha
            ],
            [
                'name' => 'Kit de Cuidados com a Pele',
                'description' => 'Um conjunto completo de produtos para cuidados com a pele, garantindo uma pele saudável.',
                'price' => 79.99,
                'expiration_date' => '2025-08-31',
                'image' => 'kit_cuidados_pele.jpg',
                'category_id' => 8, // Substitua pelo ID da categoria de Beleza
            ],
            [
                'name' => 'Limpador de Carro de Alta Performance',
                'description' => 'Um limpador automotivo eficaz para manter seu carro limpo e brilhante.',
                'price' => 14.99,
                'expiration_date' => '2024-11-30',
                'image' => 'limpador_carro.jpg',
                'category_id' => 9, // Substitua pelo ID da categoria de Automotivo
            ],
            [
                'name' => 'Quebra-Cabeça Educativo',
                'description' => 'Um quebra-cabeça educativo para estimular o aprendizado e a diversão.',
                'price' => 9.99,
                'expiration_date' => '2025-01-31',
                'image' => 'quebracabeca_educativo.jpg',
                'category_id' => 10, // Substitua pelo ID da categoria de Brinquedos
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
