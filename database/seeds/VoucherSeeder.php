<?php

use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Voucher::create([
            'promotion_code' => 'A1',
            'status' => 1,
            'description' => 'Default Voucher',
            'default'=>1,
            'starting_date'=>now(),
            'ending_date'=>now()->addYears(1000),
        ]);
    }
}
