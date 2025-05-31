<?php

namespace App\Services;

use App\Helper\ResponseHelper;
use App\Http\Resources\TicketResource;
use Illuminate\Support\Facades\Auth;
use App\Interface\TicketInterface;

class TicketService
{
    /**
     * @var TicketInterface
     */
    protected $ticketRepo;

    /**
     * @param TicketInterface $ticketRepo
     */
    public function __construct(TicketInterface $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->ticketRepo->all();
        return ResponseHelper::sendResponse(true, 'Tickets fetched successfully', TicketResource::collection($data));
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id(); // أو user_id من request حسب حالتك
        $ticket = $this->ticketRepo->create($data);
        return ResponseHelper::sendResponse(true, 'Ticket created successfully', new TicketResource($ticket));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $ticket = $this->ticketRepo->find($id);
        return ResponseHelper::sendResponse(true, 'Ticket fetched successfully', new TicketResource($ticket));
    }

    /**
     * @param $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($request, $id)
    {
        $ticket = $this->ticketRepo->update($id, $request->validated());
        return ResponseHelper::sendResponse(true, 'Ticket updated successfully', new TicketResource($ticket));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->ticketRepo->delete($id);
        return ResponseHelper::sendResponse(true, 'Ticket deleted successfully');
    }
}
