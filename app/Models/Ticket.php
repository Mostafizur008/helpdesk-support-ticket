<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Ticket;
use App\Models\ViaTicket;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_no',
        'priority_id',
        'department_id',
        'subject',
        'details',
        'images',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id', 'id');
    }

    public function via()
    {
        return $this->hasMany(ViaTicket::class, 'ticket_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(ViaTicket::class, 'ticket_id', 'ticket_no');
    }

    // public function comments()
    // {
    //     return $this->hasMany(ViaTicket::class);
    // }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $ts) {
            $ts->ticket_no = str_pad(rand(10000, 99999), 7, '0', STR_PAD_LEFT);
        });
    }
}
