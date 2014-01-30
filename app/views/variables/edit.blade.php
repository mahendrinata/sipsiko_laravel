@extends('layouts.scaffold')

@section('main')

<h1>Edit Variable</h1>
{{ Form::model($variable, array('method' => 'PATCH', 'route' => array('variables.update', $variable->id))) }}
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
    {{ link_to_route('variables.show', 'Cancel', $variable->id, array('class' => 'btn')) }}
  </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
