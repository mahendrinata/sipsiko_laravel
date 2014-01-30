<?php

class Test_type extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'name' => 'required',
  );

  public function company() {
    return $this->belongsTo('Company');
  }

  public function test() {
    return $this->hasMany('Test');
  }

  public function variable() {
    return $this->belongsToMany('Variable', 'Test_type_variable', 'test_type_id', 'variable_id');
  }

}
