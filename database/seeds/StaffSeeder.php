<?php

use App\Module;
use Illuminate\Database\Seeder;
use App\Staff;
use App\Role;
use Illuminate\Support\Facades\DB;


class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_staff')->truncate();

        $staff = Staff::create([
            'assigned_id' => rand(9911000,9919999),
            'staff_status' => 'Live',
            'title' => 'Dr',
            'firstname' => 'John',
            'middlenames' => '',
            'surname' => 'Cross',
            'address_street' => '10 Roe Road',
            'address_city' => 'Northampton',
            'address_postcode' => 'NN3 4DF',
            'contact_no' => '07852458147',
            'email' => 'john@email.com',
            'roles' => '',
            'specialist_subjects' => ['Databases', 'Artificial Intelligence', 'Critical Problem Identification'],
        ]);

        $staff2 = Staff::create([
            'assigned_id' => rand(9911000,9919999),
            'staff_status' => 'Live',
            'title' => 'Dr',
            'firstname' => 'David',
            'middlenames' => 'Andrew',
            'surname' => 'White',
            'address_street' => 'Arlington Avenue',
            'address_city' => 'Northampton',
            'address_postcode' => 'NN1 2FE',
            'contact_no' => '07866488521',
            'email' => 'david.a.w@email.com',
            'roles' => '',
            'specialist_subjects' => ['Media Tecgnology', 'Wireless Architecture', 'System Design Specification'],
        ]);

        $module = Module::where('module_title','Computing Mathematics')->first();

        $staff->modules()->attach($module);
        //$staffuser = Role::where('name','module leader')->first();

        //$staff->roles()->attach($staffuser);
    }
}
