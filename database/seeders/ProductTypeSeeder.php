<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('product_types')->insert([
            [
                'name' => 'Case Type',
                'image_path' => '/product_types_images/case_type.png',
                'slug' => Str::slug('Case Type'), // Generate slug
            ],
            [
                'name' => 'Coolers Type',
                'image_path' => '/product_types_images/coolers_type.png',
                'slug' => Str::slug('Coolers Type'), // Generate slug
            ],
            [
                'name' => 'GPU Type',
                'image_path' => '/product_types_images/gpu_type.png',
                'slug' => Str::slug('GPU Type'), // Generate slug
            ],
            [
                'name' => 'Memory Type',
                'image_path' => '/product_types_images/memory_type.png',
                'slug' => Str::slug('Memory Type'), // Generate slug
            ],
            [
                'name' => 'Motherboard Type',
                'image_path' => '/product_types_images/motherboard_type.png',
                'slug' => Str::slug('Motherboard Type'), // Generate slug
            ],
            [
                'name' => 'PSU Type',
                'image_path' => '/product_types_images/psu_type.png',
                'slug' => Str::slug('PSU Type'), // Generate slug
            ]
        ]);
    }
}
