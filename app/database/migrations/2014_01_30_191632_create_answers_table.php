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
      $table->engine = 'MYISAM';
      $table->increments('id');
      $table->text('description');
      $table->integer('value');
      $table->string('status')->index();
      $table->integer('question_id')->index();
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
    Schema::drop('answers');
  }

}
