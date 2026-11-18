<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barber_id',
        'date',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Get the barber associated with the availability.
     */
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    /**
     * Get the Appointment that owns the Availability.
     */
    public function appointment(): BelongsTo
    {
        return $this->hasOne(Appointment::class);
    }
}