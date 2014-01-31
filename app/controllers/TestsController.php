<?php

class TestsController extends BaseController {

  protected $test;

  public function __construct(Test $test) {
    $this->test = $test;
  }

  public function index() {
    $tests = $this->test->all();

    return View::make('tests.index', compact('tests'));
  }

  public function create() {
    return View::make('tests.create');
  }

  public function store() {
    $input = Input::all();
    $validation = Validator::make($input, Test::$rules);

    if ($validation->passes()) {
      $this->test->create($input);

      return Redirect::route('tests.index');
    }

    return Redirect::route('tests.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function show($id) {
    $test = $this->test->findOrFail($id);

    return View::make('tests.show', compact('test'));
  }

  public function edit($id) {
    $test = $this->test->find($id);

    if (is_null($test)) {
      return Redirect::route('tests.index');
    }

    return View::make('tests.edit', compact('test'));
  }

  public function update($id) {
    $input = array_except(Input::all(), '_method');
    $validation = Validator::make($input, Test::$rules);

    if ($validation->passes()) {
      $test = $this->test->find($id);
      $test->update($input);

      return Redirect::route('tests.show', $id);
    }

    return Redirect::route('tests.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function destroy($id) {
    $this->test->find($id)->delete();

    return Redirect::route('tests.index');
  }

}
