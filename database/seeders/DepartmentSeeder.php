<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'مشتریان',
            'status' => 'active',
        ]);

        DB::table('departments')->insert([
            'name' => 'مالی',
            'status' => 'active',
        ]);

        DB::table('departments')->insert([
            'name' => 'فنی',
            'status' => 'active',
        ]);
    }
}
