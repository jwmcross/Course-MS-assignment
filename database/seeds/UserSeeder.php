<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('role_user')->truncate();
//        DB::table('users')->truncate();

        $admin = User::create(
            [
                'username' => 'admin',
                'password' => Hash::make('admin')
            ]
        );

        $adminRole = Role::where('name','admin')->first();
        $moduleRole = Role::where('name','module leader')->first();
        $courseRole = Role::where('name','course leader')->first();

        $admin->roles()->attach($adminRole);

    }
}
