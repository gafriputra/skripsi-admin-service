<?php

namespace Database\Seeders;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::get();
        $data = [
            [
                'name' => 'ELECTROLUX MESIN CUCI FRONT LOADING WASHER EWF8005EQWA',
                'photos' => [
                    "https://myhartono.com/images/thumbnails/400/400/detailed/263/EWF8005EQWA.jpg",
                    "https://myhartono.com/images/thumbnails/400/400/detailed/309/EWF8005EQWA_2_.jpg",
                    "https://myhartono.com/images/thumbnails/400/400/detailed/309/EWF8005EQWA_3_.jpg"
                ]
            ],
            [
                'name' => 'LG 32" LED TV LM550 SERIES',
                'photos' => [
                    "https://myhartono.com/images/thumbnails/80/80/detailed/304/32LM550BPTA-rev.jpg",
                    "https://myhartono.com/images/thumbnails/400/265/detailed/271/32LM550BPTA2.jpg",
                    "https://myhartono.com/images/thumbnails/400/265/detailed/271/32LM550BPTA3.jpg"
                ]
            ],
            [
                'name' => 'LG MESIN CUCI 1 TABUNG 12kg Smart Inverter Top Loading Washer T2312VS2W',
                'photos' => [
                    "https://myhartono.com/images/thumbnails/400/400/detailed/322/T2312VS2W.jpg",
                    "https://myhartono.com/images/thumbnails/400/400/detailed/322/T2312VS2W-1.jpg",
                    "https://myhartono.com/images/thumbnails/400/400/detailed/322/T2312VS2W-2.jpg"
                ]
            ],
        ];

        foreach ($data as $key => $value) {
            $product = Product::create([
                "name" => $value['name'],
                "slug" => Str::slug($value['name']),
                "description" => "Deskripsi {$value['name']}",
                "price" => rand(100000*10, 1000000*10),
                "category_id" => $categories->random()->id,
                "status" => true
            ]);
            $gallery = [];
            foreach ($value['photos'] as $key2 => $value2) {
                $gallery[] = [
                    "product_id" => $product->id ,
                    "image" => $value2,
                    "status" => true,
                    "is_default" => $key2 == 0
                ];
            }
            if ($gallery) {
                Gallery::insert($gallery);
            }
        }
    }
}
