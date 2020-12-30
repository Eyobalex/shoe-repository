<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('shoes')->truncate();

        $date = \Carbon\Carbon::now();
        $faker =\Faker\Factory::create();

        $currency = ['USD', 'ETB', 'GBP'];

        $shoes = [];

        for ($i = 1; $i<=10; $i++){
            $shoes[] = [
                'name' => $faker->name,
                'price' => rand(50, 1000),
                'currency' => $currency[rand(0,2)],
                'owner_id' => rand(1,3),
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }

        DB::table('shoes')->insert($shoes);
    }
}
