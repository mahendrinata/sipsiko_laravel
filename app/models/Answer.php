<?php

class Answer extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'description' => 'required',
    'value' => 'required'
  );

  public function question() {
    return $this->belongsTo('Question');
  }

  public function variable() {
    return $this->belongsTo('Variable');
  }

  public function userTest() {
    return $this->belongsToMany('User_test');
  }

}
