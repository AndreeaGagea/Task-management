@extends('adminlte::page')   
@section('content')



    <div class="panel panel-default">
        <div class="panel-heading">Add New Project</div>
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
 
            {{ Form::open(array('route' => 'projects.store','method'=>'POST'))
             }}
            
            <div class="form-group">
                <label for="name">Project</label>
                <input type="text" name="name" class="form-control" value="{{  old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="name">Due date</label>
                <input type="date" name="duedate" class="form-control datepicker" value="{{ old('duedate')}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Project" class="btn btn-info">
                <a href="{{ route('projects.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
 
@endsection