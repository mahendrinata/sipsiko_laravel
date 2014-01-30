<?php

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    Eloquent::unguard();

    // $this->call('UserTableSeeder');
    $this->call('UsersTableSeeder');
    $this->call('CompaniesTableSeeder');
    $this->call('Test_typesTableSeeder');
    $this->call('VariablesTableSeeder');
    $this->call('Variable_detailsTableSeeder');
    $this->call('TestsTableSeeder');
    $this->call('QuestionsTableSeeder');
    $this->call('AnswersTableSeeder');
  }

}
