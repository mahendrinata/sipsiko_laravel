<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTestsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('user_tests', function($table) {
      $table->increments('id');
      $table->integer('spent_time');
      $table->string('status');
      $table->integer('user_id')->index();
      $table->integer('test_id')->index();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('user_tests');
  }

}
