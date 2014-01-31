<?php

class VariablesController extends BaseController {

  protected $variable;

  public function __construct(Variable $variable) {
    $this->variable = $variable;
  }

  public function index() {
    $variables = $this->variable->all();

    return View::make('variables.index', compact('variables'));
  }

  public function create() {
    return View::make('variables.create');
  }

  public function store() {
    $input = Input::all();
    $validation = Validator::make($input, Variable::$rules);

    if ($validation->passes()) {
      $this->variable->create($input);

      return Redirect::route('variables.index');
    }

    return Redirect::route('variables.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function show($id) {
    $variable = $this->variable->findOrFail($id);

    return View::make('variables.show', compact('variable'));
  }

  public function edit($id) {
    $variable = $this->variable->find($id);

    if (is_null($variable)) {
      return Redirect::route('variables.index');
    }

    return View::make('variables.edit', compact('variable'));
  }

  public function update($id) {
    $input = array_except(Input::all(), '_method');
    $validation = Validator::make($input, Variable::$rules);

    if ($validation->passes()) {
      $variable = $this->variable->find($id);
      $variable->update($input);

      return Redirect::route('variables.show', $id);
    }

    return Redirect::route('variables.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function destroy($id) {
    $this->variable->find($id)->delete();

    return Redirect::route('variables.index');
  }

}
