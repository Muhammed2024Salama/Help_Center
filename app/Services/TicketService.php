<?php

namespace App\Services;

use App\Helper\ResponseHelper;
use App\Http\Resources\TicketResource;
use Illuminate\Support\Facades\Auth;
use App\Interface\TicketInterface;

class TicketService
{
    protected $ticketRepo;

    public function __construct(TicketInterface $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    public function index()
    {
        $data = $this->ticketRepo->allWithReplies();
        return ResponseHelper::sendResponse(true, 'Tickets fetched successfully', TicketResource::collection($data));
    }

    public function store($request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $ticket = $this->ticketRepo->create($data);
        return ResponseHelper::sendResponse(true, 'Ticket created successfully', new TicketResource($ticket));
    }

    public function show($id)
    {
        $ticket = $this->ticketRepo->findWithReplies($id);
        return ResponseHelper::sendResponse(true, 'Ticket fetched successfully', new TicketResource($ticket));
    }

    public function update($request, $id)
    {
        $ticket = $this->ticketRepo->update($id, $request->validated());
        return ResponseHelper::sendResponse(true, 'Ticket updated successfully', new TicketResource($ticket));
    }

    public function destroy($id)
    {
        $this->ticketRepo->delete($id);
        return ResponseHelper::sendResponse(true, 'Ticket deleted successfully');
    }
}
