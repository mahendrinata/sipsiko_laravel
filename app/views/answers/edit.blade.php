@extends('layouts.scaffold')

@section('main')

<h1>Edit Answer</h1>
{{ Form::model($answer, array('method' => 'PATCH', 'route' => array('answers.update', $answer->id))) }}
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
    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
    {{ link_to_route('answers.show', 'Cancel', $answer->id, array('class' => 'btn')) }}
  </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
