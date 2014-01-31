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
      $table->string('middle_name')->nullable();
      $table->string('last_name')->nullable();
      $table->string('email')->unique();
      $table->text('address')->nullable();
      $table->string('phone')->nullable();
      $table->string('photo')->nullable();
      $table->text('description')->nullable();
      $table->string('password');
      $table->string('activation_code')->nullable();
      $table->string('status')->index();
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
