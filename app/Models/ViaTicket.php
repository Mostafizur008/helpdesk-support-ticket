<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Ticket;
use App\Models\ViaTicket;

class ViaTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'ticket_id',
        'comment',
        'sender_id'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(ViaTicket::class, 'ticket_no', 'ticket_id');
    }

}
