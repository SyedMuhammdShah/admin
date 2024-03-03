<?php

namespace Database\Seeders;

use App\Models\Admin\Fuel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fuel::create([
           "fuel_code" => "E5",
           "fuel_name" => "Unleaded",
           "fuel_unit" => "Gallon",
           "fuel_price" => "6.35",
        ]);

        Fuel::create([
            "fuel_code" => "E10",
            "fuel_name" => "Super Unleaded",
            "fuel_unit" => "Gallon",
            "fuel_price" => "6.99",
        ]);

        Fuel::create([
            "fuel_code" => "B7",
            "fuel_name" => "Standard Diesel",
            "fuel_unit" => "Gallon",
            "fuel_price" => "6.75",
        ]);

        Fuel::create([
            "fuel_code" => "SDV",
            "fuel_name" => "Super Diesel",
            "fuel_unit" => "Gallon",
            "fuel_price" => "7.55",
        ]);
    }
}
