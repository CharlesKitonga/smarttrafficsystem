<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::truncate(); // Remove any existing entries

        // Create the three roles: admin, officer, and user
        Role::create([
            'name' => 'admin',
            'guard_name' => 'admin'
        ]);

        Role::create([
            'name' => 'officer',
            'guard_name' => 'officer'
        ]);
        Role::create([
            'name' => 'adminorofficer',
            'guard_name' => 'adminorofficer'
        ]);

        Role::create([
            'name' => 'normal_user',
            'guard_name' => 'normal_user'
        ]);
    }
}
