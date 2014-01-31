<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

  protected $guarded = array();
  public static $rules = array(
    'username' => 'required|alpha_num||unique:users',
    'first_name' => 'required',
    'email' => 'required|email|unique:users'
  );
  protected $hidden = array('password');

  public function getAuthIdentifier() {
    return $this->getKey();
  }

  public function getAuthPassword() {
    return $this->password;
  }

  public function getReminderEmail() {
    return $this->email;
  }

  public function company() {
    return $this->hasOne('Phone');
  }

  public function userTest() {
    return $this->hasMany('User_test');
  }

  public function employee() {
    return $this->hasMany('Employee');
  }

}
