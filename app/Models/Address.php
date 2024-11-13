<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'zipcode',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'country'
    ];

    
    public function addresses() 
    {
        $this->hasOne(Address::class);
    }
}
