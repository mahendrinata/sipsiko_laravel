@extends('layouts.scaffold')

@section('main')

<h1>All Variables</h1>

<p>{{ link_to_route('variables.create', 'Add new variable') }}</p>

@if ($variables->count())
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($variables as $variable)
    <tr>
      <td>{{{ $variable->name }}}</td>
      <td>{{{ $variable->description }}}</td>
      <td>{{ link_to_route('variables.edit', 'Edit', array($variable->id), array('class' => 'btn btn-info')) }}</td>
      <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('variables.destroy', $variable->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
There are no variables
@endif

@stop
