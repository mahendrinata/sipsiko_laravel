@extends('layouts.scaffold')

@section('main')

<h1>Create Answer</h1>

{{ Form::open(array('route' => 'answers.store')) }}
<ul>
  <li>
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description') }}
  </li>

  <li>
    {{ Form::label('value', 'Value:') }}
    {{ Form::input('number', 'value') }}
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


