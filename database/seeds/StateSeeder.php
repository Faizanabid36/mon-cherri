<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();
        
        DB::table('states')->insert([
			['state_name' => 'Sindh','country_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
			['state_name' => 'Punjab','country_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
			['state_name' => 'Balochistan','country_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
			['state_name' => 'KPK','country_id'=>1,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
		]);
    }
}
