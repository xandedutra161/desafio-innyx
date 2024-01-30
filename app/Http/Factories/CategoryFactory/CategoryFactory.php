<?php

namespace App\Http\Factories\CategoryFactory;

use App\Models\Category;

class CategoryFactory implements ICategoryFactory
{
    public function createCategory(array $dados): Category
    {
        $category = new Category();

        $category->name = $dados['name'];
        
        return $category;
    }

    public function updateCategory(Category $category, array $dados): Category
    {
        $category->name = $dados['name'];
        
        return $category;
    }
}