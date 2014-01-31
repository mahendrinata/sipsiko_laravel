<?php

class Variable_detailsController extends BaseController {

  protected $variable_detail;

  public function __construct(Variable_detail $variable_detail) {
    $this->variable_detail = $variable_detail;
  }

  public function index() {
    $variable_details = $this->variable_detail->all();

    return View::make('variable_details.index', compact('variable_details'));
  }

  public function create() {
    return View::make('variable_details.create');
  }

  public function store() {
    $input = Input::all();
    $validation = Validator::make($input, Variable_detail::$rules);

    if ($validation->passes()) {
      $this->variable_detail->create($input);

      return Redirect::route('variable_details.index');
    }

    return Redirect::route('variable_details.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function show($id) {
    $variable_detail = $this->variable_detail->findOrFail($id);

    return View::make('variable_details.show', compact('variable_detail'));
  }

  public function edit($id) {
    $variable_detail = $this->variable_detail->find($id);

    if (is_null($variable_detail)) {
      return Redirect::route('variable_details.index');
    }

    return View::make('variable_details.edit', compact('variable_detail'));
  }

  public function update($id) {
    $input = array_except(Input::all(), '_method');
    $validation = Validator::make($input, Variable_detail::$rules);

    if ($validation->passes()) {
      $variable_detail = $this->variable_detail->find($id);
      $variable_detail->update($input);

      return Redirect::route('variable_details.show', $id);
    }

    return Redirect::route('variable_details.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function destroy($id) {
    $this->variable_detail->find($id)->delete();

    return Redirect::route('variable_details.index');
  }

}
