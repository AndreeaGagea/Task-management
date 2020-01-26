@extends('adminlte::page')   
@section('content') 

<h1>Task List for: {{ $name->name }} </h1>
<div class="panel panel-default">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Task Title</th>
        <th>Project Name</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>

@if ( !$task_list->isEmpty() ) 
    <tbody>
    @foreach ( $task_list as $task)
      <tr>
        <td>{{ $task->name }} </td>
        <td>{{ $task->project['name'] }}</td>
        <td>
            @if ( !$task->completed )
                <a href="{{ route('task.completed', ['id' => $task->id]) }}" class="btn btn-warning"> Mark as completed</a>
            @else
                <span class="label label-success">Completed</span>
            @endif
            
        </td>
        <td>
            
        </td>
      </tr>

    @endforeach
    </tbody>
@else 
    <p><em>There are no tasks assigned yet</em></p>
@endif


</table>
</div>








@stop