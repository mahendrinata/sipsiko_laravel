<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function($table) {
      $table->engine = 'MYISAM';
      $table->increments('id');
      $table->string('username')->unique();
      $table->string('first_name');
      $table->string('middle_name')->nullable();
      $table->string('last_name')->nullable();
      $table->string('email')->unique();
      $table->text('address')->nullable();
      $table->string('phone')->nullable();
      $table->string('photo')->nullable();
      $table->text('description')->nullable();
      $table->string('password');
      $table->string('token')->nullable();
      $table->string('status')->index();
      $table->integer('parent_id')->index()->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('users');
  }

}
