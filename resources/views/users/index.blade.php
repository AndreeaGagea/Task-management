@extends('adminlte::page')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><b>User list</b></center></div>


                <div class="panel-body">
                    <div class="form-grup">
                      <div class="pull-right"> 
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add user
</button>

<!-- Modal Add user-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/users">
        {{csrf_field()}}
      <div class="modal-body">

                  <div class="form-group">
                    <label>Name</label> <input type="text" name="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email</label> <input type="email" name="email" class="form-control" value="" placeholder="john.doe@example.com">
                  </div>
                  <div class="form-group">
                    <label>City</label> <input type="city" name="city" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Phone</label> <input type="phone_number" name="phone_number" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Password</label> <input type="password" name="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="is_admin">Admin</label> <input type="checkbox" name="admin" id="is_admin" value="1">
                  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--End Modal Add user-->
</div>
</div>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                    {{session('status') }}
                    </div>
                    @endif

                    <table class="table table-striped">
                      <thread>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>City</th>
                          <th>Phone number</th>
                          <th>Admin</th>
                          <th>Option</th>
                        </tr>
                      </thread>

                      <tbody>
                        @foreach($users as $user)
                        
                        <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->city}}</td>
                          <td>{{$user->phone_number}}</td>
                          @if($user->admin == 1)
                          <td><span class="label label-info">Yes</span></td>
                          @else
                          <td><span class="label label-warning">No</span></td>
                          @endif
                          <td>

                            <a href="/users/{{ $user->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil"> </i> Edit</a>

                            <form method="POST" action="/users/{{ $user->id}}" style="display: inline;">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"> </i> DELETE</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
  $(".error-close").on("click", closeError($this))

  function closeError(elem)
  {
    $(elem).hide()
  }

</script>
@endsection