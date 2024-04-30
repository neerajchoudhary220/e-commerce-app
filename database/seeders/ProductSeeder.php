<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products =[
            [
                'name'=>'T-shirt',
                'description'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac odio purus. Integer vel nulla non nunc finibus suscipit. ",
            ],
            [
                'name'=>'Coffee',
                'description'=>"Lorem ipsum dolor sit amet",
                
                
            ],
            [
                'name'=>'Sugar',
                'description'=>'Lorem ipsum dolor sit amet',
            ],
           
            ];

            foreach($products as $product){
                Products::updateOrCreate(['name'=>$product['name']],$product);
            }
    }
}
