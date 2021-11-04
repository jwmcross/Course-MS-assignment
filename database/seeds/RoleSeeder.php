<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('roles')->truncate();

        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'office administrator']);
        Role::create(['name' => 'staff academics']);

    }
}
