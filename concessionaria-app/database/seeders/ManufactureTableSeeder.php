<?php

namespace Database\Seeders;

use App\Models\Manufacture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class ManufactureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Manufacture::factory()->count(3)->create();

        $manufactures = [
            'Toyota',
            'Ford',
            'Volkswagen',
            'Honda',
            'Chevrolet',
            'BMW',
            'Nissan',
            'Hyundai'
        ];

        foreach($manufactures as $manufacture){
            Manufacture::factory()->create(['name' => $manufacture]);
        }
    }
}
