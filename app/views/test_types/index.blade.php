@extends('layouts.scaffold')

@section('main')

<h1>All Test_types</h1>

<p>{{ link_to_route('test_types.create', 'Add new test_type') }}</p>

@if ($test_types->count())
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($test_types as $test_type)
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
    @endforeach
  </tbody>
</table>
@else
There are no test_types
@endif

@stop
