@extends('layouts.scaffold')

@section('main')

<h1>Create Question</h1>

{{ Form::open(array('route' => 'questions.store')) }}
<ul>
  <li>
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description') }}
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


