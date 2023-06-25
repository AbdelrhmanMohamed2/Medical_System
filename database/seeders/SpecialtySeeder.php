<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['عيون', 'عظام', 'قلب', 'اشعة'];
        foreach ($names as $name) {
            Specialty::factory(1)->create(['name' => $name]);
        }
    }
}
