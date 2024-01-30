<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexReturnsCategories()
    {
        Category::factory()->count(3)->create();

        $response = $this->getJson('/api/category');

        $response
            ->assertOk()
            ->assertJsonStructure(['success', 'data', 'message'])
            ->assertJsonCount(3, 'data');
    }

    public function testStoreCreatesNewCategory()
    {
        $categoryData = ['name' => 'Nova Categoria'];

        $response = $this->postJson('/api/category', $categoryData); 

        $response
            ->assertOk()
            ->assertJsonStructure(['success', 'data', 'message'])
            ->assertJsonFragment($categoryData);
    }

    public function testShowReturnsCategory()
    {
        $category = Category::factory()->create();

        $response = $this->getJson("/api/category/{$category->id}");

        $response
            ->assertOk()
            ->assertJsonStructure(['success', 'data', 'message'])
            ->assertJsonFragment(['name' => $category->name]); // Adicione mais verificações conforme necessário
    }

    public function testUpdateModifiesCategory()
    {
        $category = Category::factory()->create();
        $updatedData = ['name' => 'Categoria Atualizada'];

        $response = $this->putJson("/api/category/{$category->id}", $updatedData); 

        $response
            ->assertOk()
            ->assertJsonStructure(['success', 'data', 'message'])
            ->assertJsonFragment($updatedData);
    }

    public function testDestroyRemovesCategory()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson("/api/category/{$category->id}");

        $response
            ->assertOk()
            ->assertJsonStructure(['success', 'data', 'message']); // Adicione mais verificações conforme necessário
    }
}