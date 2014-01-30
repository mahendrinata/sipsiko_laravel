@extends('layouts.scaffold')

@section('main')

<h1>Edit Test_type</h1>
{{ Form::model($test_type, array('method' => 'PATCH', 'route' => array('test_types.update', $test_type->id))) }}
<ul>
  <li>
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name') }}
  </li>

  <li>
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description') }}
  </li>

  <li>
    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
    {{ link_to_route('test_types.show', 'Cancel', $test_type->id, array('class' => 'btn')) }}
  </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
