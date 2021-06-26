<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProdcutTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Factory::create();

    for ($i = 0; $i < 10; $i++) {
      Product::create([
        "name" => $faker->sentence(2),
        "slug" => $faker->sentence(2),
        "price" => 234.44,
        "description" => $faker->sentence(30),
      ]);
    }
  }
}
