<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelSchedules extends Model
{
    protected $fillable = [
        'destination',
        'departure_date',
        'departure_time',
        'passenger_quota',
        'ticket_price'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'travel_schedule_id');
    }
}
