<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // filllable gunanya untuk jika insert data, kita bisa langsung assign
    // data apa saja yang kita insert secara langsung

    protected $fillable = [
        'name', 'description', 'status'
    ];

    // hidden gunanya untuk ada beberapa variabel yang gamau dimunculin, dimasukkan kesini
    protected $hidden = [];

    // bikin relasi ke gallery
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
