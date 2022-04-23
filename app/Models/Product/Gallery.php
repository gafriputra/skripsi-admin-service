<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'product_id', 'image', 'is_default', 'status'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'products_id','id');
    }
}
