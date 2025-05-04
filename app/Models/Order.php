<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'ice_cream_id',
        'status',
        'payment_status'
    ];

    public function iceCream()
    {
        return $this->belongsTo(IceCream::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);  // Defines the relationship to User
    }
}
