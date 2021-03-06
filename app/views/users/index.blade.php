@extends('layouts.scaffold')

@section('main')

<h1>All Users</h1>

<p>{{ link_to_route('users.create', 'Add new user') }}</p>

@if ($users->count())
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Username</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>Phone</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{{ $user->username }}}</td>
      <td>{{{ $user->first_name }}}</td>
      <td>{{{ $user->middle_name }}}</td>
      <td>{{{ $user->last_name }}}</td>
      <td>{{{ $user->email }}}</td>
      <td>{{{ $user->address }}}</td>
      <td>{{{ $user->phone }}}</td>
      <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
      <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="pagination">
  <?php echo $users->links(); ?>
</div>
@else
There are no users
@endif

@stop
