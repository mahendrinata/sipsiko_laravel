@extends('layouts.scaffold')

@section('main')

<h1>Show Test_type</h1>

<p>{{ link_to_route('test_types.index', 'Return to all test_types') }}</p>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>{{{ $test_type->name }}}</td>
      <td>{{{ $test_type->description }}}</td>
      <td>{{ link_to_route('test_types.edit', 'Edit', array($test_type->id), array('class' => 'btn btn-info')) }}</td>
      <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('test_types.destroy', $test_type->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
  </tbody>
</table>

@stop
