<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 0;

        if (($handler = fopen(database_path('data/property-data.csv'), 'rb')) !== false) {
            while (($data = fgetcsv($handler, 1000, ',')) !== false) {
                $row++;

                if ($row === 1) {
                    continue;
                }

                Property::create([
                    'name' => $data[0],
                    'price' => $data[1],
                    'bedrooms' => $data[2],
                    'bathrooms' => $data[3],
                    'storeys' => $data[4],
                    'garages' => $data[5],
                ]);
            }

            fclose($handler);
        }
    }
}
