<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * @var FaqService
     */
    protected $faqService;

    /**
     * @param FaqService $faqService
     */
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->faqService->index();
    }

    /**
     * @param StoreFaqRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFaqRequest $request)
    {
        return $this->faqService->store($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->faqService->show($id);
    }

    /**
     * @param UpdateFaqRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFaqRequest $request, $id)
    {
        return $this->faqService->update($request, $id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->faqService->destroy($id);
    }
}
