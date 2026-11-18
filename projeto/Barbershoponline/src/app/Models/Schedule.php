<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barber_id',
        'start_time',
        'end_time',
        'working_day',
    ];

    /**
     * Get the Barber from the Schedule.
     */
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

}