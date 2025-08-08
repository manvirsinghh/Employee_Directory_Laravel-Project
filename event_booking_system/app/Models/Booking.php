<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'user_id',
        'event_id',
        'quantity',
        'payment_status',
        'qr_code_path', // include this if you're updating it later
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
public function event(){
    return $this->belongsTo(Event::class);
}
}
