<?php

namespace App\Repository;

use App\Interface\TicketInterface;
use App\Models\Ticket;

class TicketRepository implements TicketInterface
{
    public function all()
    {
        return Ticket::all();
    }

    public function allWithReplies()
    {
        return Ticket::with('replies')->get();
    }

    public function find($id)
    {
        return Ticket::findOrFail($id);
    }

    public function findWithReplies($id)
    {
        return Ticket::with('replies')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Ticket::create($data);
    }

    public function update($id, array $data)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($data);
        return $ticket;
    }

    public function delete($id)
    {
        $ticket = Ticket::findOrFail($id);
        return $ticket->delete();
    }
}
