<?php

namespace App\Http\Factories\ProductFactory;

use App\Models\Product;

interface IProductFactory
{
    public function createProduct(array $dados): Product;
    public function updateProduct(Product $product, array $dados): Product;

}