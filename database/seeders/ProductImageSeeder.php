<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample image mappings for products
        $productImages = [
            1 => ['table1.jpg', 'table2.jpg'],
            2 => ['sofa1.jpg', 'sofa2.jpg'],
            3 => ['chair1.jpg'],
            4 => ['bedroom1.jpg', 'bedroom2.jpg', 'bedroom3.jpg'],
            5 => ['coffee-table1.jpg'],
            6 => ['desk1.jpg'],
            7 => ['wardrobe1.jpg', 'wardrobe2.jpg'],
            8 => ['bookshelf1.jpg'],
            9 => ['cabinet1.jpg'],
            10 => ['tv-unit1.jpg'],
            11 => ['dining-chairs1.jpg'],
            12 => ['beanbag1.jpg'],
            13 => ['patio1.jpg'],
            14 => ['gaming-desk1.jpg'],
            15 => ['shoe-cabinet1.jpg'],
            16 => ['chest1.jpg'],
            17 => ['executive-desk1.jpg'],
            18 => ['armchair1.jpg'],
        ];

        foreach ($productImages as $productId => $images) {
            $product = Product::find($productId);
            if ($product) {
                foreach ($images as $imageName) {
                    ProductImage::create([
                        'product_id' => $productId,
                        'image' => 'uploads/products/images/' . $imageName,
                    ]);
                }
            }
        }

        $this->command->info('Product images seeded successfully!');
    }
}
