<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
// use Database\Seeds\PermissionsTableSeeder;
use Database\Seeds\RolesTableSeeder;
use Database\Seeds\ConnectRelationshipsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            // $this->call(PermissionsTableSeeder::class);
            // $this->call(RolesTableSeeder::class);
            // $this->call(ConnectRelationshipsSeeder::class);

            $this->call('PermissionsTableSeeder');
            $this->call('RolesTableSeeder');
            $this->call('ConnectRelationshipsSeeder');

            $this->call(UsersTableSeeder::class);
            $this->call(CountrySeeder::class);
            $this->call(StateSeeder::class);
            $this->call(CitySeeder::class);

        Model::reguard();
    }
}
