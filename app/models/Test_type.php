<?php

class Test_type extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'name' => 'required',
  );

}
