<?php

class CompaniesController extends BaseController {

  protected $company;

  public function __construct(Company $company) {
    $this->company = $company;
  }

  public function index() {
    $companies = $this->company->all();

    return View::make('companies.index', compact('companies'));
  }

  public function create() {
    return View::make('companies.create');
  }

  public function store() {
    $input = Input::all();
    $validation = Validator::make($input, Company::$rules);

    if ($validation->passes()) {
      $this->company->create($input);

      return Redirect::route('companies.index');
    }

    return Redirect::route('companies.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function show($id) {
    $company = $this->company->findOrFail($id);

    return View::make('companies.show', compact('company'));
  }

  public function edit($id) {
    $company = $this->company->find($id);

    if (is_null($company)) {
      return Redirect::route('companies.index');
    }

    return View::make('companies.edit', compact('company'));
  }

  public function update($id) {
    $input = array_except(Input::all(), '_method');
    $validation = Validator::make($input, Company::$rules);

    if ($validation->passes()) {
      $company = $this->company->find($id);
      $company->update($input);

      return Redirect::route('companies.show', $id);
    }

    return Redirect::route('companies.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function destroy($id) {
    $this->company->find($id)->delete();

    return Redirect::route('companies.index');
  }

}
