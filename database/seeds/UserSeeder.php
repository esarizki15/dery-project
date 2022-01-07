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
        $role = new Role();
        $role->name = "Admin";
        $role->save();

        $role = new Role();
        $role->name = "Kepala Bagian";
        $role->save();

        $role = new Role();
        $role->name = "Kepala Divisi";
        $role->save();

        $role = new Role();
        $role->name = "Pegawai";
        $role->save();

        $user = new User();
        $user->name = "Admin Laravel";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = $role->id; 
        $user->save();

        $user = new User();
        $user->name = "Kepala Bagian";
        $user->email = "kepala_bagian@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = 2; 
        $user->save();

        $user = new User();
        $user->name = "Kepala Divisi";
        $user->email = "kepala_divisi@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = 3; 
        $user->save();

        $user = new User();
        $user->name = "Pegawai";
        $user->email = "pegawai@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = 4; 
        $user->save();
    }
}
