<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product\Category;
use App\Models\Product\Gallery;
use App\Models\Product\Document;


class Product extends Model
{
    use SoftDeletes;
    // filllable gunanya untuk jika insert data, kita bisa langsung assign
    // data apa saja yang kita insert secara langsung

    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'price', 'status'
    ];

    // hidden gunanya untuk ada beberapa variabel yang gamau dimunculin, dimasukkan kesini
    protected $hidden = [];

    // relasi gallery
    public function category()
    {
        // produk galeri ini milik dari produk
        // (model::class, 'foreignkey','primary')
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // bikin relasi ke gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }

    // bikin relasi ke gDocumentallery
    public function documents()
    {
        return $this->hasMany(Document::class, 'product_id', 'id');
    }
}
