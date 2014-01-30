<?php

class Company extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'slug' => 'required',
    'name' => 'required',
  );

  public function user() {
    return $this->belongsTo('User');
  }

  public function employee() {
    return $this->hasMany('Employee');
  }

  public function test() {
    return $this->hasMany('Test');
  }

  public function testType() {
    return $this->hasMany('Test_type');
  }

  public function variable() {
    return $this->hasMany('Variable');
  }

}
