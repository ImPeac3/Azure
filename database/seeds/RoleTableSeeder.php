<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_agent = new Role();
        $role_agent->name = 'Agent';
        $role_agent->description = "Agent";
        $role_agent->save();


        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = "Admin";
        $role_admin->save();


        $role_customer = new Role();
        $role_customer->name = 'Customer';
        $role_customer->description = "Customer";
        $role_customer->save();
    }
}
