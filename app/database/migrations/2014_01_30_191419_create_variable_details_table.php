<?php

use Illuminate\Database\Migrations\Migration;

class CreateVariableDetailsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('variable_details', function($table) {
      $table->increments('id');
      $table->text('description');
      $table->string('status')->index();
      $table->integer('variable_id')->index();
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
    Schema::drop('variable_details');
  }

}
