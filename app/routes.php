<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {
  return View::make('hello');
});

Route::resource('users', 'UsersController');

Route::resource('companies', 'CompaniesController');

Route::resource('test_types', 'Test_typesController');

Route::resource('variables', 'VariablesController');

Route::resource('variable_details', 'Variable_detailsController');

Route::resource('tests', 'TestsController');

Route::resource('questions', 'QuestionsController');

Route::resource('answers', 'AnswersController');
