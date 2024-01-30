<?php

namespace App\Http\Controllers;

use App\Http\Etc\ResponseHelper;
use App\Http\Factories\CategoryFactory\ICategoryFactory;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends Controller
{
    private readonly ICategoryFactory $categoryFactory;

    public function __construct(ICategoryFactory $categoryFactory)
    {
        $this->categoryFactory = $categoryFactory;
    }

    /**
     * Exibe uma lista dos recursos.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return ResponseHelper::success($categories);
    }

    /**
     * Armazena um recurso recém-criado no armazenamento.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $data = $request->all();

        $category = $this->categoryFactory->createCategory($data);

        $category->save();

        return ResponseHelper::success($category, "Categoria criada com sucesso.");
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $category = Category::find($id);

        if (is_null($category))
        {
            return ResponseHelper::error("Categoria não encontrada, verifique o ID e tente novamente.");
        }

        return ResponseHelper::success($category);
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param CategoryRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, string $id): JsonResponse
    {
        $category = Category::find($id);

        if (is_null($category))
        {
            return ResponseHelper::error("Categoria não encontrada, verifique o ID e tente novamente.");
        }

        $data = $request->all();

        $category = $this->categoryFactory->updateCategory($category, $data);

        $category->update();

        return ResponseHelper::success($category, "Categoria atualizada com sucesso.");
    }

    /**
     * Remove o recurso especificado do armazenamento.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $category = Category::find($id);

        if (is_null($category))
        {
            return ResponseHelper::error("Categoria não encontrada, verifique o ID e tente novamente.");
        }

        $category->delete();

        return ResponseHelper::success("Categoria deletada com sucesso.");
    }
}
