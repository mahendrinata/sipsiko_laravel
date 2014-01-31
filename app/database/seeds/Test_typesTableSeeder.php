<?php

class Test_typesTableSeeder extends Seeder {

  public function run() {
    DB::table('test_types')->truncate();

    $test_types = array(
      array('name' => 'MBTI (Myers-Briggs Type Indicator)'),
      array('name' => 'DISC (Dominance, Influence, Steadiness, Compliance)'),
      array('name' => 'EPPS (Edwards Personal Preference Schedule)'),
      array('name' => '16PF (16 Personality Factors)'),
      array('name' => 'IST (Initial Strength Test)'),
      array('name' => 'MMI (Multiple Mini Interview)'),
      array('name' => 'Modalitas Belajar'),
      array('name' => 'PAPI Kostick (Personality and Preference Inventory)'),
      array('name' => 'RMIB (Rothwell Miller Interest Blank)'),
    );

    foreach ($test_types as $key => $value) {
      $test_types[$key]['status'] = 'ACTIVE';
      $test_types[$key]['created_at'] = date('Y-m-d H:i:s');
      $test_types[$key]['updated_at'] = date('Y-m-d H:i:s');
    }

    DB::table('test_types')->insert($test_types);
  }

}
