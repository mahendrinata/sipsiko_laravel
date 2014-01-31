<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('questions', function($table) {
      $table->increments('id');
      $table->text('description');
      $table->string('status')->index();
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
    Schema::drop('questions');
  }

}
