<?php

namespace App\Services;

use App\Helper\ResponseHelper;
use App\Http\Resources\CategoryResource;
use App\Interface\CategoryInterface;
use Illuminate\Http\Request;

class CategoryService
{
    /**
     * @var CategoryInterface
     */
    protected $categoryRepo;

    /**
     * @param CategoryInterface $categoryRepo
     */
    public function __construct(CategoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->categoryRepo->all();
        return ResponseHelper::sendResponse(true, 'Categories fetched successfully', CategoryResource::collection($data));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $category = $this->categoryRepo->create($request->validated());
        return ResponseHelper::sendResponse(true, 'Category created successfully', new CategoryResource($category));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = $this->categoryRepo->find($id);
        return ResponseHelper::sendResponse(true, 'Category fetched successfully', new CategoryResource($category));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $category = $this->categoryRepo->update($id, $request->validated());
        return ResponseHelper::sendResponse(true, 'Category updated successfully', new CategoryResource($category));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return ResponseHelper::sendResponse(true, 'Category deleted successfully');
    }
}
