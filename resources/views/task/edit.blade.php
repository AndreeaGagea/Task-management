@extends('adminlte::page')   
@section('content')


<div class="container">
  <div class="col-md-10 col-md-offset-1">
    <form action="{{ route('task.update', [ 'id' => $task->id ] ) }}" method="POST" >
    {{ csrf_field() }}
    <input type="hidden" name="task_id" value="{{ $task->id }}">

    <div class="form-group">
            <label>Task</label>
            <input type="text" class="form-control"  name="name" value="{{ $task->name }}">
    </div>
    <div class="form-group">
             <label>User</label>

              <select name="user_id" id="user_id" class="form-control">
                    @foreach( $users as $user)
                        <option value="{{ $user->id }}" 
                          @if( $task->user->id == $user->id )
                                selected
                          @endif
                          >{{ $user->name }}
                        </option>
                    @endforeach
              </select>
    </div>
    <div class="form-group">
             <label>Project</label>

              <select name="project_id" id="project_id" class="form-control">
                    @foreach( $projects as $project)
                        <option value="{{ $project->id }}" 
                          @if( $task->project->id == $project->id )
                                selected
                          @endif
                          >{{ $project->name }}
                        </option>
                    @endforeach
              </select>
    </div>
    <div class="form-group">
            <label>Status</label>
            <select name="completed" class="form-control">
                @if( $task->completed == 0 )
                    <option value="0" selected>Not Completed</option>
                    <option value="1">Completed</option>
                @else
                    <option value="0">Not Completed</option>
                    <option value="1" selected>Completed</option>
                @endif
            </select>
    </div>
    <div class="form-group">
            <label>Due Date </label>
                <input type="date" name="due_date" class="form-control" value="{{  $task->due_date }}">
    </div>
    <div class="form-group">
                <input type="submit" value="Save Changes" class="btn btn-info">
                <a href="{{ route('task.show')  }}" class="btn btn-default">Cancel</a>
                
    </div>

</form>
</div>
</div>



    @endsection