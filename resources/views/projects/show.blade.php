@extends('adminlte::page')   
 
@section('content')
<div class="panel panel-default">
    
        <h2>{{ $project->name}} </h2>
        <p> {{ $project->description}} </p>
</div>


@endsection