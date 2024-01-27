<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartmentId',
        'apartmentName',
        'room',
        'price',
        ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
