<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Http\Requests\StoreTicketReplyRequest;
use App\Models\TicketReply;
use Illuminate\Http\Request;

class TicketReplyController extends Controller
{
    public function store(StoreTicketReplyRequest $request)
    {
        $reply = TicketReply::create([
            'ticket_id' => $request->ticket_id,
            'user_id' => auth()->id(),
            'reply' => $request->reply,
        ]);

        return ResponseHelper::sendResponse(
            true,
            'Reply added successfully',
            $reply,
            200,
            null
        );
    }
}
