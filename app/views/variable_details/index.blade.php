@extends('layouts.scaffold')

@section('main')

<h1>All Variable_details</h1>

<p>{{ link_to_route('variable_details.create', 'Add new variable_detail') }}</p>

@if ($variable_details->count())
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Description</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($variable_details as $variable_detail)
    <tr>
      <td>{{{ $variable_detail->description }}}</td>
      <td>{{ link_to_route('variable_details.edit', 'Edit', array($variable_detail->id), array('class' => 'btn btn-info')) }}</td>
      <td>
        {{ Form::open(array('method' => 'DELETE', 'route' => array('variable_details.destroy', $variable_detail->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
There are no variable_details
@endif

@stop
