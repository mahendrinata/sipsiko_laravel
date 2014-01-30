<?php

class Variable extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'name' => 'required',
  );

  public function company() {
    return $this->belongsTo('Company');
  }

  public function testType() {
    return $this->belongsToMany('Test_type');
  }

  public function userTest() {
    return $this->belongsToMany('User_test');
  }

  public function variableDetail() {
    return $this->hasMany('Variable_detail');
  }

  public function answer() {
    return $this->hasMany('Answer');
  }

}
