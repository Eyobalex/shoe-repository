<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('users')->truncate();

        $faker = \Faker\Factory::create();
        $date = \Carbon\Carbon::now();


        DB::table('users')->insert([
            [
                'name' => 'Don Joe',
                'email' => 'don@test.com',
                'password' => bcrypt('12345'),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Abebe',
                'email' => 'abebe@test.com',
                'password' => bcrypt('12345'),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Kebede',
                'email' => 'kebede@test.com',
                'password' => bcrypt('12345'),
                'created_at' => $date,
                'updated_at' => $date
            ],

        ]);
    }
}
