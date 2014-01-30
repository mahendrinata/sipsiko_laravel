<?php

class Variable_detail extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'description' => 'required'
  );

  public function variable() {
    return $this->belongsTo('Variable');
  }

}
