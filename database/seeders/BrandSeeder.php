<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Aprilia', 'slug' => 'aprilia'],
            ['name' => 'Benelli', 'slug' => 'benelli'],
            ['name' => 'BMW', 'slug' => 'bmw'],
            ['name' => 'Ducati', 'slug' => 'ducati'],
            ['name' => 'Harley-Davidson', 'slug' => 'harley-davidson'],
            ['name' => 'Honda', 'slug' => 'honda'],
            ['name' => 'Husqvarna', 'slug' => 'husqvarna'],
            ['name' => 'Kawasaki', 'slug' => 'kawasaki'],
            ['name' => 'KTM', 'slug' => 'ktm'],
            ['name' => 'Piaggio', 'slug' => 'piaggio'],
            ['name' => 'Royal Enfield', 'slug' => 'royal-enfield'],
            ['name' => 'Suzuki', 'slug' => 'suzuki'],
            ['name' => 'SYM', 'slug' => 'sym'],
            ['name' => 'Triumph', 'slug' => 'triumph'],
            ['name' => 'Yamaha', 'slug' => 'yamaha'],
            ['name' => 'Zontes', 'slug' => 'zontes'],
        ];

        foreach ($brands as $brand) {
            \App\Models\Brand::updateOrCreate(['slug' => $brand['slug']], $brand);
        }
    }
}
