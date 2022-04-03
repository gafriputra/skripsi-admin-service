<?php

namespace App\Models\CompanyProfile;

use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    // filllable gunanya untuk jika insert data, kita bisa langsung assign
    // data apa saja yang kita insert secara langsung

    protected $fillable = [
        'slogan', 'email', 'phone', 'image', 'address', 'description', 'store_link', 'google_maps'
    ];

    // hidden gunanya untuk ada beberapa variabel yang gamau dimunculin, dimasukkan kesini
    protected $hidden = [];
}
