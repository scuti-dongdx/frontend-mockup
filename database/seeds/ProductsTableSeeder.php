<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $names = ['apparel', 'accessories','jewellery', 'timepiece', 'bags', 'shoes', 'tools'];
        $sales_office = ['北海道','東北','關東','中部','近畿','中国','四国','九州'];
        for ($i = 0; $i <= 100 ; $i++) {
            $index = rand(0,6);
            $index_sales_office = rand(0,7);
            $product = Product::create([
                'title' => $names[$index],

                'sales_office' => $sales_office[$index_sales_office],
                'store_name' => '渋谷一丁目'.$index,
                'prefecture' => '東京都',
                'address' => '渋谷区渋谷１－２４－６ マトリクスツービル',
                'telephone_number' => '03-2828-292'.$index_sales_office,
                'number_of_equipment' => '1'.$index_sales_office,
                
                'price' => rand(1000,5000),
                'description' => $faker->text(),
                'user_id' => rand(0,100),
                'active_row' => rand(0,1)
            ]);
            $loop = rand(2, 3);
            for ($j = 1; $j <= $loop; $j++) {
                $product->product_images()->create([
                    'image' => $faker->imageUrl()
                ]);
            }
        }
    }
}