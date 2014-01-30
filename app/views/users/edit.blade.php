@extends('layouts.scaffold')

@section('main')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
<ul>
  <li>
    {{ Form::label('username', 'Username:') }}
    {{ Form::text('username') }}
  </li>

  <li>
    {{ Form::label('first_name', 'First_name:') }}
    {{ Form::text('first_name') }}
  </li>

  <li>
    {{ Form::label('middle_name', 'Middle_name:') }}
    {{ Form::text('middle_name') }}
  </li>

  <li>
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email') }}
  </li>

  <li>
    {{ Form::label('address', 'Address:') }}
    {{ Form::textarea('address') }}
  </li>

  <li>
    {{ Form::label('phone', 'Phone:') }}
    {{ Form::text('phone') }}
  </li>

  <li>
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description') }}
  </li>

  <li>
    {{ Form::label('password', 'Password:') }}
    {{ Form::text('password') }}
  </li>

  <li>
    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
    {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
  </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
