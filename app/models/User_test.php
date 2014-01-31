<?php

class User_test extends Eloquent {

  protected $guarded = array();

  public function user() {
    return $this->belongsTo('User');
  }

  public function test() {
    return $this->belongsTo('Test');
  }

  public function variable() {
    return $this->belongsToMany('Variable', 'User_test_variable', 'user_test_id', 'variable_id');
  }

  public function answer() {
    return $this->belongsToMany('Answer', 'User_test_answer', 'user_test_id', 'answer_id');
  }

}
