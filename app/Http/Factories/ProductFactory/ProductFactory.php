<?php

namespace App\Http\Factories\ProductFactory;

use App\Models\Product;

class ProductFactory implements IProductFactory
{
    public function createProduct(array $dados): Product
    {
        $product = new Product();

        $product->name = $dados['name'];
        $product->description = $dados['description'];
        $product->price = $dados['price'];
        $product->expiration_date = $dados['expiration_date'];
        $product->image = $dados['image'];
        $product->category_id = $dados['category_id'];

        return $product;
    }

    public function updateProduct(Product $product, array $dados): Product
    {
        $product->name = $dados['name'] ?? $product->name;
        $product->description = $dados['description'] ?? $product->description;
        $product->price = $dados['price'] ?? $product->price;
        $product->expiration_date = $dados['expiration_date'] ?? $product->expiration_date;
        $product->category_id = $dados['category_id'] ?? $product->category_id;

        if (isset($dados['image'])) {
            $product->image = $dados['image'];
        }

        return $product;
    }
}
