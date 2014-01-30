@extends('layouts.scaffold')

@section('main')

<h1>Show Answer</h1>

<p>{{ link_to_route('answers.index', 'Return to all answers') }}</p>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Description</th>
      <th>Value</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>{{{ $answer->description }}}</td>
      <td>{{{ $answer->value }}}</td>
      <td>{{ link_to_route('answers.edit', 'Edit', array($answer->id), array('class' => 'btn btn-info')) }}</td>
      <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('answers.destroy', $answer->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
  </tbody>
</table>

@stop
