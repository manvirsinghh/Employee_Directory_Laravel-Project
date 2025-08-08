<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Transaction extends Model
{
    //
      use HasFactory;
    protected $fillable = [
    'user_id',
    'event_id',
    'amount',
    'payment_intent_id',
    'status',
];

}
