<?php

class UsersController extends BaseController {

  protected $user;

  public function __construct(User $user) {
    $this->user = $user;
  }

  public function index() {
    $users = $this->user->paginate(10);
    
    return View::make('users.index', compact('users'));
  }

  public function create() {
    return View::make('users.create');
  }

  public function store() {
    $input = Input::all();
    $validation = Validator::make($input, User::$rules);

    if ($validation->passes()) {
      $this->user->create($input);

      return Redirect::route('users.index');
    }

    return Redirect::route('users.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function show($id) {
    $user = $this->user->findOrFail($id);

    return View::make('users.show', compact('user'));
  }

  public function edit($id) {
    $user = $this->user->find($id);

    if (is_null($user)) {
      return Redirect::route('users.index');
    }

    return View::make('users.edit', compact('user'));
  }

  public function update($id) {
    $input = array_except(Input::all(), '_method');
    $validation = Validator::make($input, User::$rules);

    if ($validation->passes()) {
      $user = $this->user->find($id);
      $user->update($input);

      return Redirect::route('users.show', $id);
    }

    return Redirect::route('users.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
  }

  public function destroy($id) {
    $this->user->find($id)->delete();

    return Redirect::route('users.index');
  }

}
