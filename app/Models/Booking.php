<?php

namespace App\Models;

use App\PaymentStatus;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'travel_schedule_id',
        'ticket_quantity',
        'payment_status'
    ];

    protected $casts = [
        'payment_status' => PaymentStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travelSchedule()
    {
        return $this->belongsTo(TravelSchedules::class, 'travel_schedule_id');
    }
}
