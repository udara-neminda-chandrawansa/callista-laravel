<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Modern Dining Table',
                'description' => 'Elegant modern dining table perfect for contemporary homes. Made from high-quality oak wood with a sleek finish.',
                'new_price' => 125000,
                'old_price' => 135000,
                'rating' => 4,
                'barcode' => 'CAL-DT-001',
                'color' => 'Oak Brown',
                'vendor' => 'Callista Furniture',
                'type' => 'tables',
                'weight' => 45.00,
                'size' => 4.05,
                'stock_status' => 'in_stock',
                'tags' => ['dining', 'table', 'oak', 'modern']
            ],
            [
                'name' => 'Luxury Leather Sofa',
                'description' => 'Premium leather sofa with exceptional comfort and style. Perfect for living rooms and lounges.',
                'new_price' => 275000,
                'old_price' => 295000,
                'rating' => 5,
                'barcode' => 'CAL-LR-002',
                'color' => 'Dark Brown',
                'vendor' => 'Callista Furniture',
                'type' => 'living-room',
                'weight' => 85.50,
                'size' => 7.20,
                'stock_status' => 'in_stock',
                'tags' => ['sofa', 'leather', 'luxury', 'comfortable']
            ],
            [
                'name' => 'Ergonomic Office Chair',
                'description' => 'Professional office chair with lumbar support and adjustable height. Ideal for long working hours.',
                'new_price' => 45000,
                'old_price' => 50000,
                'rating' => 4,
                'barcode' => 'CAL-CH-003',
                'color' => 'Black',
                'vendor' => 'Callista Furniture',
                'type' => 'chairs',
                'weight' => 18.00,
                'size' => 0.65,
                'stock_status' => 'in_stock',
                'tags' => ['chair', 'office', 'ergonomic', 'adjustable']
            ],
            [
                'name' => 'Complete Bedroom Set',
                'description' => 'Full bedroom furniture set including bed, nightstands, and dresser. Modern design with ample storage.',
                'new_price' => 350000,
                'old_price' => 380000,
                'rating' => 5,
                'barcode' => 'CAL-BR-004',
                'color' => 'White Oak',
                'vendor' => 'Callista Furniture',
                'type' => 'bedroom-sets',
                'weight' => 125.00,
                'size' => 15.50,
                'stock_status' => 'in_stock',
                'tags' => ['bedroom', 'set', 'storage', 'modern']
            ],
            [
                'name' => 'Designer Coffee Table',
                'description' => 'Stylish glass-top coffee table with wooden legs. Perfect centerpiece for any living room.',
                'new_price' => 65000,
                'old_price' => 72000,
                'rating' => 4,
                'barcode' => 'CAL-TB-005',
                'color' => 'Clear Glass',
                'vendor' => 'Callista Furniture',
                'type' => 'tables',
                'weight' => 25.00,
                'size' => 1.20,
                'stock_status' => 'in_stock',
                'tags' => ['coffee-table', 'glass', 'designer', 'modern']
            ],
            [
                'name' => 'Study Desk with Storage',
                'description' => 'Functional study desk with built-in drawers and shelving. Great for students and professionals.',
                'new_price' => 75000,
                'old_price' => 85000,
                'rating' => 4,
                'barcode' => 'CAL-DS-006',
                'color' => 'Mahogany',
                'vendor' => 'Callista Furniture',
                'type' => 'tables',
                'weight' => 35.00,
                'size' => 2.10,
                'stock_status' => 'in_stock',
                'tags' => ['desk', 'storage', 'study', 'functional']
            ],
            [
                'name' => 'Wardrobe with Mirror',
                'description' => 'Spacious wardrobe with full-length mirror and multiple compartments for organized storage.',
                'new_price' => 185000,
                'old_price' => 200000,
                'rating' => 5,
                'barcode' => 'CAL-WR-007',
                'color' => 'Walnut',
                'vendor' => 'Callista Furniture',
                'type' => 'bedroom-sets',
                'weight' => 75.00,
                'size' => 8.40,
                'stock_status' => 'in_stock',
                'tags' => ['wardrobe', 'mirror', 'storage', 'bedroom']
            ],
            [
                'name' => 'Wooden Bookshelf',
                'description' => 'Five-tier wooden bookshelf perfect for organizing books, decorative items, and storage boxes.',
                'new_price' => 55000,
                'old_price' => 60000,
                'rating' => 4,
                'barcode' => 'CAL-BS-008',
                'color' => 'Pine',
                'vendor' => 'Callista Furniture',
                'type' => 'living-room',
                'weight' => 28.00,
                'size' => 1.95,
                'stock_status' => 'in_stock',
                'tags' => ['bookshelf', 'wooden', 'storage', 'organizing']
            ],
            [
                'name' => 'Kitchen Cabinet Set',
                'description' => 'Complete kitchen cabinet solution with modern hardware and durable construction.',
                'new_price' => 225000,
                'old_price' => 250000,
                'rating' => 4,
                'barcode' => 'CAL-KC-009',
                'color' => 'White',
                'vendor' => 'Callista Furniture',
                'type' => 'living-room',
                'weight' => 95.00,
                'size' => 12.00,
                'stock_status' => 'low_stock',
                'tags' => ['kitchen', 'cabinet', 'storage', 'modern']
            ],
            [
                'name' => 'TV Entertainment Unit',
                'description' => 'Modern TV stand with cable management and storage compartments for media devices.',
                'new_price' => 95000,
                'old_price' => 105000,
                'rating' => 4,
                'barcode' => 'CAL-TV-010',
                'color' => 'Black Ash',
                'vendor' => 'Callista Furniture',
                'type' => 'living-room',
                'weight' => 42.00,
                'size' => 3.60,
                'stock_status' => 'in_stock',
                'tags' => ['tv-stand', 'entertainment', 'storage', 'cable-management']
            ],
            [
                'name' => 'Dining Chair Set',
                'description' => 'Set of 4 comfortable dining chairs with cushioned seats and ergonomic design.',
                'new_price' => 85000,
                'old_price' => 95000,
                'rating' => 4,
                'barcode' => 'CAL-DC-011',
                'color' => 'Beige',
                'vendor' => 'Callista Furniture',
                'type' => 'chairs',
                'weight' => 32.00,
                'size' => 1.80,
                'stock_status' => 'in_stock',
                'tags' => ['dining', 'chairs', 'set', 'cushioned']
            ],
            [
                'name' => 'Bean Bag Chair',
                'description' => 'Comfortable bean bag chair filled with premium beans. Perfect for relaxation and casual seating.',
                'new_price' => 25000,
                'old_price' => 28000,
                'rating' => 4,
                'barcode' => 'CAL-BB-012',
                'color' => 'Navy Blue',
                'vendor' => 'Callista Furniture',
                'type' => 'chairs',
                'weight' => 8.00,
                'size' => 0.45,
                'stock_status' => 'in_stock',
                'tags' => ['bean-bag', 'comfortable', 'relaxation', 'casual']
            ],
            [
                'name' => 'Garden Patio Set',
                'description' => 'Weather-resistant outdoor furniture set including table and 4 chairs. Perfect for garden dining.',
                'new_price' => 165000,
                'old_price' => 180000,
                'rating' => 4,
                'barcode' => 'CAL-PS-013',
                'color' => 'Teak',
                'vendor' => 'Callista Furniture',
                'type' => 'living-room',
                'weight' => 68.00,
                'size' => 5.20,
                'stock_status' => 'low_stock',
                'tags' => ['outdoor', 'patio', 'weather-resistant', 'garden']
            ],
            [
                'name' => 'Computer Gaming Desk',
                'description' => 'Spacious gaming desk with RGB lighting, cable management, and cup holder. Gamer approved!',
                'new_price' => 115000,
                'old_price' => 125000,
                'rating' => 5,
                'barcode' => 'CAL-GD-014',
                'color' => 'Black',
                'vendor' => 'Callista Furniture',
                'type' => 'tables',
                'weight' => 38.00,
                'size' => 2.40,
                'stock_status' => 'in_stock',
                'tags' => ['gaming', 'desk', 'rgb', 'cable-management', 'customizable']
            ],
            [
                'name' => 'Shoe Storage Cabinet',
                'description' => 'Multi-level shoe storage cabinet that can hold up to 20 pairs of shoes. Space-saving design.',
                'new_price' => 35000,
                'old_price' => 40000,
                'rating' => 4,
                'barcode' => 'CAL-SC-015',
                'color' => 'White',
                'vendor' => 'Callista Furniture',
                'type' => 'bedroom-sets',
                'weight' => 22.00,
                'size' => 1.20,
                'stock_status' => 'in_stock',
                'tags' => ['storage', 'shoes', 'cabinet', 'space-saving']
            ],
            [
                'name' => 'Antique Wooden Chest',
                'description' => 'Vintage-style wooden storage chest with intricate carvings. Limited edition piece.',
                'new_price' => 195000,
                'old_price' => 220000,
                'rating' => 5,
                'barcode' => 'CAL-AC-016',
                'color' => 'Dark Oak',
                'vendor' => 'Callista Furniture',
                'type' => 'living-room',
                'weight' => 45.00,
                'size' => 2.80,
                'stock_status' => 'low_stock',
                'tags' => ['antique', 'wooden', 'chest', 'vintage', 'customizable']
            ],
            [
                'name' => 'Executive Office Desk',
                'description' => 'Large executive desk made from premium mahogany wood. Perfect for corporate offices.',
                'new_price' => 285000,
                'old_price' => 320000,
                'rating' => 5,
                'barcode' => 'CAL-ED-017',
                'color' => 'Mahogany',
                'vendor' => 'Callista Furniture',
                'type' => 'tables',
                'weight' => 65.00,
                'size' => 4.80,
                'stock_status' => 'low_stock',
                'tags' => ['executive', 'office', 'mahogany', 'premium']
            ],
            [
                'name' => 'Vintage Armchair',
                'description' => 'Classic vintage armchair with velvet upholstery. Currently out of stock.',
                'new_price' => 145000,
                'old_price' => 160000,
                'rating' => 4,
                'barcode' => 'CAL-VA-018',
                'color' => 'Burgundy',
                'vendor' => 'Callista Furniture',
                'type' => 'chairs',
                'weight' => 35.00,
                'size' => 1.65,
                'stock_status' => 'out_of_stock',
                'tags' => ['vintage', 'armchair', 'velvet', 'classic']
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        $this->command->info('Product seeder completed successfully!');
    }
}
