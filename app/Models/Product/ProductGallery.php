<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    // filllable gunanya untuk jika inProductGallerysert data, kita bisa langsung assign
    // data apa saja yang kita insert secara langsung

    protected $fillable = [
        'product_id', 'image', 'is_default', 'status'
    ];

    // hidden gunanya untuk ada beberapa variabel yang gamau dimunculin, dimasukkan kesini
    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'products_id','id');
    }

    public function getImageAttribute($value)
    {
        return url('storage/' . $value);
    }
}
