<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTestVariablesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('user_test_variables', function($table) {
      $table->engine = 'MYISAM';
      $table->increments('id');
      $table->integer('value')->nullable();
      $table->integer('user_test_id')->index();
      $table->integer('variable_id')->index();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('user_test_variables');
  }

}
