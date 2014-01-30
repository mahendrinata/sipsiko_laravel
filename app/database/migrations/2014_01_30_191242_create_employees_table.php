<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('employees', function($table) {
      $table->increments('id');
      $table->string('status');
      $table->integer('company_id')->index();
      $table->integer('user_id')->index();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('employees');
  }

}
