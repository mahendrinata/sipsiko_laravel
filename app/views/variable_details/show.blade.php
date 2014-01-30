@extends('layouts.scaffold')

@section('main')

<h1>Show Variable_detail</h1>

<p>{{ link_to_route('variable_details.index', 'Return to all variable_details') }}</p>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Description</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>{{{ $variable_detail->description }}}</td>
      <td>{{ link_to_route('variable_details.edit', 'Edit', array($variable_detail->id), array('class' => 'btn btn-info')) }}</td>
      <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('variable_details.destroy', $variable_detail->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
  </tbody>
</table>

@stop
