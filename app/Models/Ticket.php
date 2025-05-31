<?php

namespace App\Models;

use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'status'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'status' => TicketStatus::OPEN->value,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(TicketReply::class);
    }
}
