<?php

class CompaniesTableSeeder extends Seeder {

  public function run() {
    DB::table('companies')->truncate();

    $faker = Faker\Factory::create('en_US');
    $faker->seed(1234);

    $companies[] = array(
      'slug' => 'sipsiko',
      'name' => 'SIPSIKO APP',
      'description' => 'SIPSIKO Test Psikologi Online',
      'status' => 'ACTIVE',
      'user_id' => 1,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
    );

    for ($i = 2; $i < 26; $i++) {
      $companyName = $faker->company;
      $companies[] = array(
        'slug' => strtolower($companyName),
        'name' => $companyName,
        'description' => $faker->text,
        'status' => 'ACTIVE',
        'user_id' => $i,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
      );
    }

    DB::table('companies')->insert($companies);
  }

}
