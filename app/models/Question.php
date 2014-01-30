<?php

class Question extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'description' => 'required'
  );

  public function test() {
    return $this->belongsTo('Test');
  }

  public function answer() {
    return $this->hasMany('Answer');
  }

}
