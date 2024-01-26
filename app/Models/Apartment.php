<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

        'county',
        'location',
        'bedroom',
        'bathroom',
        'description',
        'mainImage',

    ];

    public function apartmentRooms()
    {
        return $this->hasMany(ApartmentRoom::class);
    }

}
