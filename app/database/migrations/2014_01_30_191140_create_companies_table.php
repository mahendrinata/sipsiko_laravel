<?php

use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('companies', function($table) {
      $table->increments('id');
      $table->string('slug')->unique();
      $table->string('name');
      $table->text('description');
      $table->string('status');
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
    Schema::drop('companies');
  }

}
