<?php

namespace Database\Seeders;

use App\Models\Supply;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supply::factory(100)->create();
        //
    }
}
