<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IceCream extends Model
{
    protected $fillable = ['name', 'size', 'price', 'flavor',];

    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'size' => 'required|in:Small,Medium,Large',
            'price' => 'required|numeric|min:0',
            'flavor' => 'required|string|max:255',
            
            
        ];
    }

    // Optional: Accessor for formatted price
    public function getFormattedPriceAttribute()
    {
        return '₱' . number_format($this->price, 2);
    }
}
