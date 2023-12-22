<?php

namespace Database\Seeders;

use Faker\Guesser\Name;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_categories')->insert([
            [
                "name" => "AC",
                "slug" => "ac",
                "image" => "1521969345.png",

            ],
            [
                "name" => "beauty",
                "slug" => "beauty",
                "image" => "1521969358.png",

            ],
            [
                "name" => "pulmping",
                "slug" => "pulmping",
                "image" => "1521969409.png",

            ],
            [
                "name" => "Electrical",
                "slug" => "Electrical",
                "image" => "1521969419.png",

            ],
            [
                "name" => "Shower Filter",
                "slug" => "Shower_Filter",
                "image" => "1521969430.png",

            ],
            [
                "name" => "Home Cleaning",
                "slug" => "Home_Cleaning",
                "image" => "1521969446.png",

            ],
            [
                "name" => "Carpentry",
                "slug" => "Carpentry",
                "image" => "1521969454.png",

            ],
            [
                "name" => "Pest Control",
                "slug" => "Pest_Control",
                "image" => "1521969464.png",

            ],
            [
                "name" => "Chinmeny Hope",
                "slug" => "Chinmeny_Hope",
                "image" => "1521969490.png",

            ],
            [
                "name" => "Computer Repair",
                "slug" => "Computer_Repair",
                "image" => "1521969512.png",

            ],
            [
                "name" => "Tv Repair",
                "slug" => "Tv_Repair",
                "image" => "1521969522.png",

            ],
            [
                "name" => "Refrigerator Repair",
                "slug" => "Refrigerator_Repair",
                "image" => "1521969536.png",

            ],
            [
                "name" => "Gyster",
                "slug" => "Gyster",
                "image" => "1521969558.png",

            ],
            [
                "name" => "car",
                "slug" => "car",
                "image" => "1521969576.png",

            ],
            [
                "name" => "document",
                "slug" => "document",
                "image" => "1521974355.png",

            ],
            [
                "name" => "Movers & Packers",
                "slug" => "Movers_&_Packers",
                "image" => "1521969599.png",

            ],
            [
                "name" => "Home Automation",
                "slug" => "Home_Automation",
                "image" => "1521969622.png",

            ],
            [
                "name" => "Laundry",
                "slug" => "Laundry",
                "image" => "1521972624.png",

            ],
            [
                "name" => "painting",
                "slug" => "painting",
                "image" => "1521972643.png",

            ],
        ]);
    }
}
