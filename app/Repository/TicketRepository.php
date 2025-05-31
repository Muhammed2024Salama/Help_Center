<?php

namespace App\Repository;

use App\Interface\TicketInterface;
use App\Models\Ticket;

class TicketRepository implements TicketInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return Ticket::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Ticket::findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Ticket::create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($data);
        return $ticket;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $ticket = Ticket::findOrFail($id);
        return $ticket->delete();
    }
}
