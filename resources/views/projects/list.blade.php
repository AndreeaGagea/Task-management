@extends('adminlte::page')   
@section('content')         
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <div class="panel panel-default">
        <div class="panel-heading">
           <center><b> Project List</b></center>
        </div>
        
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                
                                <a class="btn btn-success" href="{{ route('projects.create') }}">Create Project</a>
            
                </div>
            </div>
  <p>Total Projects: <b> {{count($projects)}} </b> </p>
            <table class="table table-striped">
                <tr>
                    <th width="20">No</th>
                    <th>Project</th>
                    <th>Tasks</th>
                    <th> Users </th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Due date</th>
                    <th width="300">Action</th>
                </tr>
                @if (count($projects) > 0)
                    @foreach ($projects as $key => $project)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $project->name }}</td>
                            <td><a href="{{ route('task.list', [ 'projectid' => $project->id ]) }}">{{count($project->tasks()->get())}}</a></td>
                            <td></td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->created_at->diffForHumans()  }}</td>
                            <td>{{ $project->duedate     }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}"> <i class="fa fa-pencil"> </i>Edit</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['projects.destroy', $project->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Project not found!</td>
                    </tr>
                @endif
            </table>
 
            {{ $projects->render() }}
 
        </div>
    </div>
 
@endsection