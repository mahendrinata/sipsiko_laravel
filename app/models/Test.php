<?php

class Test extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'name' => 'required',
    'duration' => 'numeric',
  );

  public function company() {
    return $this->belongsTo('Company');
  }

  public function testType() {
    return $this->belongsTo('Test_type');
  }

  public function question() {
    return $this->hasMany('Question');
  }

  public function userTest() {
    return $this->hasMany('User_test');
  }

}
