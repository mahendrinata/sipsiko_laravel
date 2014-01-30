<?php

class Company extends Eloquent {

  protected $guarded = array();
  public static $rules = array(
    'slug' => 'required',
    'name' => 'required',
  );

}
