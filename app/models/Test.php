<?php

class Test extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'name' => 'required',
    'description' => 'required',
    'duration' => 'required',
    'start_date' => 'required',
    'end_date' => 'required'
  );

}
