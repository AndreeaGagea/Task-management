@extends('layouts.app')  
@section('content')         
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-70">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center><b>My task</b></center> 
        </div>
        
        <div class="panel-body">
            
 
            <table class="table table-bordered table-stripped">
                <tr>
                    <th>Project name</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th width="300">Action</th>
                </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>

            </table>
 
 
        </div>
    </div>
</div>
 
@endsection