@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit user</div>

                <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                    {{session('status') }}
                    </div>
                    @endif
                <form method="POST" action="/users/{{$user->id}}">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                   
                  <div class="form-group">
                    Name <input type="text" name="name" class="form-control" value="{{  $user->name }}">
                  </div>
                  <div class="form-group">
                    Email <input type="email" name="email" class="form-control" value="{{  $user->email }}" >
                  </div>
                  <div class="form-group">
                    City <input type="text" name="city" class="form-control" value="{{  $user->city }}">
                  </div>
                  <div class="form-group">
                    Phone number <input type="text" name="phone_number" class="form-control" value="{{  $user->phone_number }}">
                  </div>
                  <div class="form-group">
                    <label for="is_admin">Admin</label> <input type="checkbox"  {{ $user->admin?"checked='checked'":"" }} name="admin" id="is_admin" value="1">
                  </div>
                  <div class="form-group">
                    Password <input type="password" name="password" class="form-control" value="{{  $user->password }}">
                  </div>
                  <div class="form-group">
                    <button type="text" class="btn btn-primary">Update</button>
                    <a href="/users" class="btn btn-default">Cancel</a>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection