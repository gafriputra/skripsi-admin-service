<?php

namespace Database\Seeders;

use App\Models\Product\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Gadget", "Elektronik", "Home Theater"];
        $data = [];
        foreach ($categories as $key => $value) {
            $data[] = [
                "name" => $value,
                "description" => "Deskripsi dari $value",
                "status" => true
            ];
        }
        Category::insert($data);
    }
}
