<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'title',
        'description',
        'date_time',
        'location',

        'category_id',
        'price',
        'date',
        'image',
        'status',
    ];
    protected $casts = [
        'date_time' => 'datetime',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
    public function remainingSeats(){
        return $this->capacity-$this->bookings()->sum('quantity');
    }

}
