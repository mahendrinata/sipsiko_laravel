<?php

use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('answers', function($table) {
      $table->increments('id');
      $table->text('description');
      $table->integer('value');
      $table->integer('question_id')->index();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('answers');
  }

}
