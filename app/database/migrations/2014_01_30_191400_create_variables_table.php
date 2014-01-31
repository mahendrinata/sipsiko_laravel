<?php

use Illuminate\Database\Migrations\Migration;

class CreateVariablesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('variables', function($table) {
      $table->engine = 'MYISAM';
      $table->increments('id');
      $table->string('name');
      $table->text('description')->nullable();
      $table->string('status');
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
    Schema::drop('variables');
  }

}
