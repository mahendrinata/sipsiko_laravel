<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTestAnswersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('user_test_answers', function($table) {
      $table->engine = 'MYISAM';
      $table->increments('id');
      $table->integer('user_test_id')->index();
      $table->integer('answer_id')->index();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('user_test_answers');
  }

}
