<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'vesselname','vesselnumber', 'departuredate', 'arrivaldate','vesselcapacity','departurelocation','arrivallocation',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
