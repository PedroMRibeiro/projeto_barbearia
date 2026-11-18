<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'contact',
        'availability_id',
        'service_id',
        'barber_id',
    ];

    /**
     * Get the service associated with the appointment.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the Barber from the Schedule.
     */
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    /**
     * Get the Aviability associated with the Appointment.
     */
    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }
}
