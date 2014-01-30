<?php

use Illuminate\Database\Migrations\Migration;

class CreateTestTypesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('test_types', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->text('description');
      $table->string('status');
      $table->integer('company_id')->index();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('test_types');
  }

}
