<?php

namespace App\Http\Controllers;

use App\Http\Etc\ResponseHelper;
use App\Http\Factories\ProductFactory\IProductFactory;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private readonly IProductFactory $productFactory;

    public function __construct(IProductFactory $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->paginate(2);

        return view('home', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = $this->productFactory->createProduct($data);
        $product->save();

        if ($request->expectsJson()) {
            return ResponseHelper::success($product, "Produto criado com sucesso.");
        } else {
            return view('sua.view', ['product' => $product, 'message' => "Produto criado com sucesso."]);
        }
    }

    public function show(string $id, Request $request)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $request->expectsJson()
                ? ResponseHelper::error("Produto não encontrado, verifique o ID e tente novamente.")
                : view('home', ['message' => "Produto não encontrado, verifique o ID e tente novamente."]);
        }

        return $request->expectsJson()
            ? ResponseHelper::success($product)
            : view('home', ['product' => $product]);
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param CategoryRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'expiration_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::find($id);
        if (is_null($product)) {
            return $request->expectsJson()
                ? ResponseHelper::error("Produto não encontrado, verifique o ID e tente novamente.")
                : view('home', ['message' => "Produto não encontrado, verifique o ID e tente novamente."]);
        }

        $product = $this->productFactory->updateProduct($product, $validatedData);

        $product->update();

        $products = Product::paginate(2);

        $currentPage = $request->input('page', 1);

        return $request->expectsJson()
            ? ResponseHelper::success($product, "Produto atualizado com sucesso.")
            : redirect('/home?page=' . $currentPage)->with(['products' => $products]);
    }



    public function destroy(string $id, Request $request)
    {
        if (!ctype_digit($id) || $id <= 0) {
            return $request->expectsJson()
                ? ResponseHelper::error("ID de produto inválido.")
                : redirect()->route('home');
        }

        try {
            Product::destroy($id);

            $message = "Produto deletado com sucesso.";

            return $request->expectsJson()
                ? ResponseHelper::success($message)
                : redirect()->route('home');
        } catch (\Exception $e) {
            return $request->expectsJson()
                ? ResponseHelper::error("Erro ao excluir o produto.")
                : redirect()->route('home');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function list()
    {
        $products = Product::all();
        return view('products.list', ['products' => $products]);
    }
}
