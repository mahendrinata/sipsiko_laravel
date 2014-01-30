@extends('layouts.scaffold')

@section('main')

<h1>All Tests</h1>

<p>{{ link_to_route('tests.create', 'Add new test') }}</p>

@if ($tests->count())
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Duration</th>
      <th>Start_date</th>
      <th>End_date</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($tests as $test)
    <tr>
      <td>{{{ $test->name }}}</td>
      <td>{{{ $test->description }}}</td>
      <td>{{{ $test->duration }}}</td>
      <td>{{{ $test->start_date }}}</td>
      <td>{{{ $test->end_date }}}</td>
      <td>{{ link_to_route('tests.edit', 'Edit', array($test->id), array('class' => 'btn btn-info')) }}</td>
      <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('tests.destroy', $test->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
There are no tests
@endif

@stop
