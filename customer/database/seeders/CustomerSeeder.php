<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert(
            [
                [
                    "name" => "Ninh",
                    "birthday" => "1998-02-10",
                    "address" => "Phu Tho",
                    "email" => "ninh@gmail",
                    "city_id" =>"1",
                    "phone" => "12345",
                ],
                [
                    "name" => "Tuan",
                    "birthday" => "1998-06-12",
                    "address" => "Phu Tho",
                    "email" => "ninh@gmail",
                    "city_id" =>"2",
                    "phone" => "12345",
                ],

            ]
        );
    }
}
