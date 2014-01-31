<?php

use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('tests', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->text('description')->nullable();
      $table->integer('duration')->nullable();
      $table->date('start_date')->nullable();
      $table->date('end_date')->nullable();
      $table->string('status')->index();
      $table->boolean('is_public');
      $table->integer('company_id')->index();
      $table->integer('test_type_id')->index();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('tests');
  }

}
