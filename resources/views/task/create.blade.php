@extends('adminlte::page') 

@section('content')

<div class="panel panel-default">
        <div class="panel-heading">Add New Task</div>
        <div class="panel-body">
 
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            {{ Form::open(array('route' => 'task.store','method'=>'POST'))
             }}
            <div class="form-group">
                <label for="name">Task</label>
                <input type="text" name="name" class="form-control" value="{{  old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="name">Project</label>
                <select name="project_id" class="selectpicker" data-style="btn-primary">
                  @foreach ($projects as $project)
                  <option value="{{ $project->id }}">{{$project->name}}</option>
                  @endforeach
                </select>

            </div>
            <div class="form-group">
              <label>User</label>
              <select id="user" name="user" class="selectpicker" data-style="btn-info">
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>

            </div>

            <div class="form-group">
              <label>Select due date </label>
              <input type="date" name="due_date" class="form-control datepicker" value="{{ old('due_date')}}" required>
        </div>

            
            <div class="form-group">
                <input type="submit" value="Add Task" class="btn btn-info">
                <a href="{{ route('task.show')  }}" class="btn btn-default">Cancel</a>
                
            </div>
            {{ Form::close() }}
        </div>
    </div>



@endsection

<script src="{{ asset('js/moment.js') }}"></script> 

    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>  

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        jQuery(document).ready(function() {

            jQuery(function() {
                jQuery('#datetimepicker1').datetimepicker( {
                    defaultDate:'now',  // defaults to today
                    format: 'YYYY-MM-DD hh:mm:ss',  // YEAR-MONTH-DAY hour:minute:seconds
                    minDate:new Date()  // Disable previous dates, minimum is todays date
                });
            });
        });
    </script>