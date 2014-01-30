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
      $table->increments('id');
      $table->string('username')->unique();
      $table->string('first_name');
      $table->string('middle_name');
      $table->string('last_name');
      $table->string('email')->unique();
      $table->text('address');
      $table->string('phone');
      $table->string('photo');
      $table->text('description');
      $table->string('password');
      $table->string('password_salt');
      $table->string('activation_code');
      $table->string('status');
      $table->integer('parent_id')->index();
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
