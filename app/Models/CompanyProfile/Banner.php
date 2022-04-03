<?php

namespace App\Models\CompanyProfile;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    // filllable gunanya untuk jika insert data, kita bisa langsung assign
    // data apa saja yang kita insert secara langsung

    protected $fillable = [
        'header1', 'header2', 'image', 'caption', 'link', 'status'
    ];

    // hidden gunanya untuk ada beberapa variabel yang gamau dimunculin, dimasukkan kesini
    protected $hidden = [];
}
