@extends('layouts.scaffold')

@section('main')

<h1>Edit Variable_detail</h1>
{{ Form::model($variable_detail, array('method' => 'PATCH', 'route' => array('variable_details.update', $variable_detail->id))) }}
<ul>
  <li>
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description') }}
  </li>

  <li>
    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
    {{ link_to_route('variable_details.show', 'Cancel', $variable_detail->id, array('class' => 'btn')) }}
  </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
