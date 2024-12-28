<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\Department;
use Database\Factories\StaffFactory;
use Database\Factories\DepartmentFactory;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::all();
        Staff::factory()->count(50)->create([
            'department_id' => function () use ($departments) {
                return $departments->random()->id;
            },
        ]);
    }
}
