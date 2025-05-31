<?php

namespace App\Services;

use App\Http\Resources\FaqResource;
use App\Interface\FaqInterface;
use Illuminate\Http\Request;

class FaqService
{
    /**
     * @var FaqInterface
     */
    protected $faqRepo;

    /**
     * @param FaqInterface $faqRepo
     */
    public function __construct(FaqInterface $faqRepo)
    {
        $this->faqRepo = $faqRepo;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->faqRepo->all();
        return response()->json([
            'success' => true,
            'message' => 'FAQs fetched successfully',
            'data' => FaqResource::collection($data)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $faq = $this->faqRepo->create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'FAQ created successfully',
            'data' => new FaqResource($faq)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $faq = $this->faqRepo->find($id);
        return response()->json([
            'success' => true,
            'message' => 'FAQ fetched successfully',
            'data' => new FaqResource($faq)
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $faq = $this->faqRepo->update($id, $request->validated());
        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully',
            'data' => new FaqResource($faq)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->faqRepo->delete($id);
        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully',
            'data' => null
        ]);
    }
}
