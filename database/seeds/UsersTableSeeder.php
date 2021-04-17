<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();


        $adminRole = config('roles.models.role')::where('slug', '=', 'admin')->first();
        $userRole = config('roles.models.role')::where('slug', '=', 'customer')->first();
        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === null) {

            $admin = config('roles.models.defaultUser')::create([
                'slug'     => 'admin',
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]);

            $admin->info()->create(['first_name'=>'admin']);

            $admin->attachRole($adminRole);

            foreach ($permissions as $permission) {
                $admin->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'user@user.com')->first() === null) {
            $user = config('roles.models.defaultUser')::create([
                'slug'     => 'user',
                'name'     => 'User',
                'email'    => 'user@user.com',
                'password' => bcrypt('password'),
            ]);

            $user->info()->create(['first_name'=> 'Dummy' ]);

            $user->attachRole($userRole);
        }
    }
}
