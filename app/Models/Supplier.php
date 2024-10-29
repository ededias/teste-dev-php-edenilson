<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class Supplier extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'fantasy',
        'social',
        'email',
        'document',
        'phone',
        'ie',
        'im',
        'category'
    ];

    public function address() 
    {
        $this->belongsTo(Address::class, 'supplier_id', 'id');
    }

}
