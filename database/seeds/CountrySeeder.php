<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	

        DB::table('countries')->delete();

        DB::table('countries')->insert([
			['country_name' => 'Pakistan','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
		]);
    }
}
