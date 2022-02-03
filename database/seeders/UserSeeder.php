<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'علیرضا بازرگانی',
            'status' => 'active',
            'number' => '09308990856',
            'rule' => 'admin',
            'email' => 'info@arbazargani.ir',
            'password' => Hash::make('adminstrator09308990856'),
        ]);

        DB::table('users')->insert([
            'name' => 'حسام آرین',
            'status' => 'active',
            'number' => '09218786620',
            'rule' => 'cusotmer',
            'email' => 'info@arian.ir',
            'password' => Hash::make('info@arian.ir'),
        ]);
    }
}
