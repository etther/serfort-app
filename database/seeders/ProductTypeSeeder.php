<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

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
            ],
            [
                'name' => 'Coolers Type',
                'image_path' => '/product_types_images/coolers_type.png',
            ],
            [
                'name' => 'GPU Type',
                'image_path' => '/product_types_images/gpu_type.png',
            ],
            [
                'name' => 'Memory Type',
                'image_path' => '/product_types_images/memory_type.png',
            ],
            [
                'name' => 'Motherboard Type',
                'image_path' => '/product_types_images/motherboard_type.png',
            ],
            [
                'name' => 'PSU Type',
                'image_path' => '/product_types_images/psu_type.png',
            ]

        ]);
    }
}