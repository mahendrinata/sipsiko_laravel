<?php

class AnswersController extends BaseController {

  /**
   * Answer Repository
   *
   * @var Answer
   */
  protected $answer;

  public function __construct(Answer $answer) {
    $this->answer = $answer;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index() {
    $answers = $this->answer->all();

    return View::make('answers.index', compact('answers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create() {
    return View::make('answers.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store() {
    $input = Input::all();
    $validation = Validator::make($input, Answer::$rules);

    if ($validation->passes()) {
      $this->answer->create($input);

      return Redirect::route('answers.index');
    }

    return Redirect::route('answers.create')
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
    $answer = $this->answer->findOrFail($id);

    return View::make('answers.show', compact('answer'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id) {
    $answer = $this->answer->find($id);

    if (is_null($answer)) {
      return Redirect::route('answers.index');
    }

    return View::make('answers.edit', compact('answer'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id) {
    $input = array_except(Input::all(), '_method');
    $validation = Validator::make($input, Answer::$rules);

    if ($validation->passes()) {
      $answer = $this->answer->find($id);
      $answer->update($input);

      return Redirect::route('answers.show', $id);
    }

    return Redirect::route('answers.edit', $id)
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
    $this->answer->find($id)->delete();

    return Redirect::route('answers.index');
  }

}
