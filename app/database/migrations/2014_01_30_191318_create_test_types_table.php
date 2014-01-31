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
      $table->engine = 'MYISAM';
      $table->increments('id');
      $table->string('name');
      $table->text('description')->nullable();
      $table->string('status')->index();
      $table->integer('company_id')->index()->nullable();
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
