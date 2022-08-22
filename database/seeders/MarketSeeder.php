<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Market::create([
            'market_name'   => 'Toko Bebas',
            'phone_number'  => 6969696969,
            'address'       => 'Jl. Violet no.69, Banjarmasin',
        ]);
    }
}
