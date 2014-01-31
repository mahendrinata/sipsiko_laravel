<?php

class Test_typesController extends BaseController {

  protected $test_type;

  public function __construct(Test_type $test_type) {
    $this->test_type = $test_type;
  }

  public function index() {
    $test_types = $this->test_type->all();

    return View::make('test_types.index', compact('test_types'));
  }

  public function create() {
    return View::make('test_types.create');
  }

  public function store() {
    $input = Input::all();
    $validation = Validator::make($input, Test_type::$rules);

    if ($validation->passes()) {
      $this->test_type->create($input);

      return Redirect::route('test_types.index');
    }

    return Redirect::route('test_types.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function show($id) {
    $test_type = $this->test_type->findOrFail($id);

    return View::make('test_types.show', compact('test_type'));
  }

  public function edit($id) {
    $test_type = $this->test_type->find($id);

    if (is_null($test_type)) {
      return Redirect::route('test_types.index');
    }

    return View::make('test_types.edit', compact('test_type'));
  }

  public function update($id) {
    $input = array_except(Input::all(), '_method');
    $validation = Validator::make($input, Test_type::$rules);

    if ($validation->passes()) {
      $test_type = $this->test_type->find($id);
      $test_type->update($input);

      return Redirect::route('test_types.show', $id);
    }

    return Redirect::route('test_types.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function destroy($id) {
    $this->test_type->find($id)->delete();

    return Redirect::route('test_types.index');
  }

}
