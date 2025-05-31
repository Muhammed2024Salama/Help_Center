<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index()
    {
        return $this->faqService->index();
    }

    public function store(StoreFaqRequest $request)
    {
        return $this->faqService->store($request);
    }

    public function show($id)
    {
        return $this->faqService->show($id);
    }

    public function update(UpdateFaqRequest $request, $id)
    {
        return $this->faqService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->faqService->destroy($id);
    }
}
