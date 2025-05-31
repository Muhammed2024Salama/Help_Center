<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * @var TicketService
     */
    protected $ticketService;

    /**
     * @param TicketService $ticketService
     */
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->ticketService->index();
    }

    /**
     * @param StoreTicketRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTicketRequest $request)
    {
        return $this->ticketService->store($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->ticketService->show($id);
    }

    /**
     * @param UpdateTicketRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTicketRequest $request, $id)
    {
        return $this->ticketService->update($request, $id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->ticketService->destroy($id);
    }
}
