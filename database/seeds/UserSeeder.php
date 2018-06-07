<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminrole = new Role();
        $adminrole->name = "Admin";
        $adminrole->display_name = "Admin";
        $adminrole->save();

        $memberRole = new Role();
        $memberRole->name = "Member";
        $memberRole->display_name ="Member";
        $memberRole->save();

        $admin = new User();
        $admin->name ='admin';
        $admin->email ='admin@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminrole);
        
        $member = new User();
        $member->name ='Sample member';
        $member->email ='member@gmail.com';
        $member->password =bcrypt('rahasia');
        $member->save();
        $member->attachRole($memberRole);

    }
}
