<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['start_time', 'finish_time', 'comments', 'user_id', 'indoor_id', 'phoneNumber', 'custName'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function indoor(): BelongsTo
    {
        return $this->belongsTo(Indoor::class);
    }
}
