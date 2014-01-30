@extends('layouts.scaffold')

@section('main')

<h1>Create Test</h1>

{{ Form::open(array('route' => 'tests.store')) }}
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
    {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
  </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop


