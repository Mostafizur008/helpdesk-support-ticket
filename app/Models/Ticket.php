<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function via()
    {
        return $this->hasMany(ViaTicket::class, 'ticket_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(ViaTicket::class, 'ticket_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $ts) {
            $ts->ticket_no = str_pad(rand(10000, 99999), 7, '0', STR_PAD_LEFT);
        });
    }
}
