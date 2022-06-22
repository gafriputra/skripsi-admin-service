<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'product_id', 'name', 'document_link', 'type','status'
    ];

    // hidden gunanya untuk ada beberapa variabel yang gamau dimunculin, dimasukkan kesini
    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'products_id','id');
    }
}
