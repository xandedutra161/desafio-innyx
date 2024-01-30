<?php

namespace App\Http\Factories\CategoryFactory;

use App\Models\Category;

interface ICategoryFactory
{
    public function createCategory(array $dados): Category;
    public function updateCategory(Category $category, array $dados): Category;
}