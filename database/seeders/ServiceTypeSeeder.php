<?php

namespace Database\Seeders;

use App\Domain\ServiceTypes\Models\ServiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Console\ServeCommand;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceType::create(['name' => 'dine_in']);
        ServiceType::create(['name' => 'takeaway']);
        ServiceType::create(['name' => 'delivery']);
        ServiceType::create(['name' => 'reservations']);
    }
}
