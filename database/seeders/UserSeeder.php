<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Access;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'              => 'admin',
            'username'          => 'admin',
            'email'             => 'admin@gmail.co.id',
            'password'          =>  Hash::make('admin'),
            'role'              => 'admin',
            'profile_picture'   => 'profile.png',
        ]);

        $admin_access = Access::create([
            'manage_account'        => 1,
            'manage_product'        => 1,
            'manage_transaction'    => 1,
            'manage_report'         => 1,
            'users_id'              => $admin->id
        ]);

        $seller = User::create([
            'name'              => 'seller',
            'username'          => 'seller',
            'email'             => 'seller@gmail.co.id',
            'password'          =>  Hash::make('seller'),
            'role'              => 'seller',
            'profile_picture'   => 'profile.png',
        ]);


        $seller_access = Access::create([
            'manage_account'        => 0,
            'manage_product'        => 1,
            'manage_transaction'    => 1,
            'manage_report'         => 1,
            'users_id'              => $admin->id
        ]);
    }
}
