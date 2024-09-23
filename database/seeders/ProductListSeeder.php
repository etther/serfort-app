<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'ROG CROSSHAIR X870E HERO',
                'description' => 'The AI PC-ready ROG Crosshair X870E Hero offers unyielding power delivery, robust thermal management, hyperspeed connectivity, comprehensive PCIE 5.0 and DDR5 support to unleash the performance of AMD Ryzen™ 9000 Series processors. Dark hues predominate across this motherboard, drawing your attention to premium metallic textures, nickel-plated surfaces, sleek contours and a stereoscopic visual effect on the large M.2 and chipset heatsink. This board also features the Polymo Lighting II effect. This upgraded lighting module built into the I/O shroud provides more dynamic RGB illumination for the signature ROG logo.',
                'price' => 3503000.00,
                'product_type_id' => 5,
                'image_path' => '/product_images/x870e.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
