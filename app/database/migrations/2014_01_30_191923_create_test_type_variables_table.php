<?php

use Illuminate\Database\Migrations\Migration;

class CreateTestTypeVariablesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('test_type_variables', function($table) {
      $table->increments('id');
      $table->integer('test_type_id')->index();
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
    Schema::drop('test_type_variable');
  }

}
