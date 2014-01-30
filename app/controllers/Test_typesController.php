<?php

class Test_typesController extends BaseController {

  /**
   * Test_type Repository
   *
   * @var Test_type
   */
  protected $test_type;

  public function __construct(Test_type $test_type) {
    $this->test_type = $test_type;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index() {
    $test_types = $this->test_type->all();

    return View::make('test_types.index', compact('test_types'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create() {
    return View::make('test_types.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
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

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id) {
    $test_type = $this->test_type->findOrFail($id);

    return View::make('test_types.show', compact('test_type'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id) {
    $test_type = $this->test_type->find($id);

    if (is_null($test_type)) {
      return Redirect::route('test_types.index');
    }

    return View::make('test_types.edit', compact('test_type'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
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

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id) {
    $this->test_type->find($id)->delete();

    return Redirect::route('test_types.index');
  }

}
