@extends('adminlte::page')   
@section('content')         



<div class="panel panel-default">
        <div class="panel-heading">
            <center><b>Task list</b></center>
        </div>
        <div class="panel-body">
          <div class="form-group">
                <div class="pull-right">
                
                                <a class="btn btn-success" href="{{ route('task.create') }}">Create Task</a>
            
                </div>
            </div>
<p>Total Tasks: <b> {{count($tasks)}} </b> </p>
<table class="table table-striped">
    <thead>
      <tr>
        <th width="20">No</th>
        <th>Task Title </th>
        <th>Project</th>
        <th>User</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Duedate</th>
        <th>Actions</th>
      </tr>
    </thead>

@if ( !$tasks->isEmpty() ) 
    <tbody>
    @foreach ( $tasks as $task)
      <tr>
        <td>{{ ++$i }}</td>
        
        <td>{{ $task->name }} </td>
        <td><span class="label label-info">{{ $task->project['name']}}</span></td>

        <td> @foreach( $users as $user) 
                @if ( $user->id == $task->user_id )
                    <a href="{{ route('users.list', [ 'id' => $user->id ]) }}">{{ $user->name }}</a>
                @endif
            @endforeach
        </td>
        <td>@if ( !$task->completed )
                <a href="{{ route('task.completed', ['id' => $task->id]) }}" class="btn btn-warning"> Mark as completed</a>
                <span class="label label-danger">{{ ( $task->due_date < Carbon\Carbon::now() )  ? "!" : "" }}</span>
            @else
                <span class="label label-success">Completed</span>
            @endif
        </td>
        <td>{{$task->created_at->diffForHumans()}}</td>
        <td>{{$task->due_date}}</td>
        <td>
          <a class="btn btn-primary" href="{{ route('task.edit',$task->id) }}"> <i class="fa fa-pencil"> </i>Edit</a>
            {{ Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id],'style'=>'display:inline', 'onsubmit' => 'ConfirmDelete()']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}

        </td>
      </tr>

    @endforeach
    </tbody>



@else 
    <p><em>There are no tasks assigned yet</em></p>
@endif


</table>
{{ $tasks->render() }}
</div>
</div>
@endsection

<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

</script>