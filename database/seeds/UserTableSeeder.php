<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','Admin')->first();
        $role_agent = Role::where('name','Agent')->first();
        $role_customer = Role::where('name','Customer')->first();

        $user = new User();
        $user->name ='Admin';
        $user->email= 'Admin@gmail.com';
        $user->password= bcrypt('admin');
        $user->save();
        $user->attachRole($role_admin);

        $user = new User();
        $user->name ='Agent';
        $user->email= 'Agent@gmail.com';
        $user->password= bcrypt('agent');
        $user->save();
        $user->attachRole($role_agent);

        $user = new User();
        $user->name ='Customer';
        $user->email= 'Customer@gmail.com';
        $user->password= bcrypt('customer');
        $user->save();
        $user->attachRole($role_customer);
    }
}
