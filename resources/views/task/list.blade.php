@extends('adminlte::page')   
@section('content')         

<h1>Project Task List for: {{ $project_name->name }}</h1>
<div class="panel panel-default">
<table class="table table-bordered table-stripped">
    <thead>
      <tr>
        <th>Task Title</th>
        <th>Project Name</th>
        <th>User</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>

@if ( !$task_list->isEmpty() ) 
    <tbody>
    @foreach ( $task_list as $task)
      <tr>
        <td>{{ $task->name }} </td>
        <td>{{ $task->project->name }}</td>
        <td>{{ $task->user['name']}}</td>
        <td>
            @if ( !$task->completed )
                <a href="{{ route('task.completed', ['id' => $task->id]) }}" class="btn btn-warning"> Mark as completed</a>
            @else
                <span class="label label-success">Completed</span>
            @endif    
        </td>
        <td>
            <!-- <a href="{{ route('task.edit', ['id' => $task->id]) }}" class="btn btn-primary"> edit </a> -->
            

        </td>
      </tr>

    @endforeach
    </tbody>
@else 
    <p><em>There are no tasks assigned yet</em></p>
@endif


</table>


</div>


@endsection