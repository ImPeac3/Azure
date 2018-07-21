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
        $user->email= 'Admin@live.com';
        $user->contact= '0103298348';
        $user->password= bcrypt('123456');
        $user->save();
        $user->attachRole($role_admin);

        $user = new User();
        $user->name ='AgentA';
        $user->email= 'AgentA@live.com';
        $user->contact= '0145829603';
        $user->password= bcrypt('123456');
        $user->save();
        $user->attachRole($role_agent);

        $user = new User();
        $user->name ='AgentB';
        $user->email= 'AgentB@live.com';
        $user->contact= '0136294821';
        $user->password= bcrypt('123456');
        $user->save();
        $user->attachRole($role_agent);

        $user = new User();
        $user->name ='Alvin';
        $user->email= 'Alvin@live.com';
        $user->contact= '0163632534';
        $user->password= bcrypt('123456');
        $user->save();
        $user->attachRole($role_customer);

        $user = new User();
        $user->name ='Ben';
        $user->email= 'Ben@live.com';
        $user->contact= '0178823928';
        $user->password= bcrypt('123456');
        $user->save();
        $user->attachRole($role_customer);
    }
}
