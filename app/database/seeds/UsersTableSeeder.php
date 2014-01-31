<?php

class UsersTableSeeder extends Seeder {

  public function run() {
    DB::table('users')->truncate();

    $faker = Faker\Factory::create('en_US');
    $faker->seed(1234);
    
    $passwordDefault = '12345';
    
    $users[] = array(
        'username' => 'admin',
        'first_name' => 'Administrator',
        'middle_name' => NULL,
        'last_name' => NULL,
        'email' => 'admin@sipsiko.com',
        'address' => 'Jl. Penyu No. 40 Bandung',
        'phone' => '+6285721821555',
        'description' => 'Administrator SIPSIKO APP',
        'password' => Hash::make($passwordDefault),
        'token' => md5(Hash::make($passwordDefault)),
        'status' => 'ACTIVE',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    );

    for ($i = 0; $i < 24; $i++) {
      $users[] = array(
        'username' => $faker->userName,
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'description' => $faker->text,
        'password' => Hash::make($passwordDefault),
        'token' => md5(Hash::make($passwordDefault)),
        'status' => 'ACTIVE',
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
      );
    }

    DB::table('users')->insert($users);
  }

}
