<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductTypeSlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all product types
        $productTypes = ProductType::all();

        // Iterate over each product type and generate slug
        foreach ($productTypes as $productType) {
            // If slug is empty or null, generate one based on name
            if (empty($productType->slug)) {
                $productType->slug = Str::slug($productType->name);
                $productType->save();
            }
        }
    }
}
