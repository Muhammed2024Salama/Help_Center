<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->categoryService->index();
    }

    /**
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        return $this->categoryService->store($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->categoryService->show($id);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        return $this->categoryService->update($request, $id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }
}
