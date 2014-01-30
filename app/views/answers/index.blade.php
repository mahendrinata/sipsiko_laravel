@extends('layouts.scaffold')

@section('main')

<h1>All Answers</h1>

<p>{{ link_to_route('answers.create', 'Add new answer') }}</p>

@if ($answers->count())
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Description</th>
      <th>Value</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($answers as $answer)
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
    @endforeach
  </tbody>
</table>
@else
There are no answers
@endif

@stop
