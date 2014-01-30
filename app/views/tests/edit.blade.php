@extends('layouts.scaffold')

@section('main')

<h1>Edit Test</h1>
{{ Form::model($test, array('method' => 'PATCH', 'route' => array('tests.update', $test->id))) }}
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
    {{ Form::label('duration', 'Duration:') }}
    {{ Form::input('number', 'duration') }}
  </li>

  <li>
    {{ Form::label('start_date', 'Start_date:') }}
    {{ Form::text('start_date') }}
  </li>

  <li>
    {{ Form::label('end_date', 'End_date:') }}
    {{ Form::text('end_date') }}
  </li>

  <li>
    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
    {{ link_to_route('tests.show', 'Cancel', $test->id, array('class' => 'btn')) }}
  </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
