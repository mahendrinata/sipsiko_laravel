<?php

class Employee extends Eloquent {

  protected $guarded = array();

  public function user() {
    return $this->belongsTo('User');
  }

  public function company() {
    return $this->belongsTo('Company');
  }

}
