@extends('adminlte::page')

@section('content')
<div class="container">
    
</div>
<section class="content">

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count($projects)}}</h3>

                <p>Projects</p>
              </div>
              <div class="icon">
                <i class="ion-android-clipboard"></i>
              </div>
              <a href="\projects" class="small-box-footer">More info </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>

                <p>Tasks</p>
              </div>
              <div class="icon">
                <i class="ion-android-people"></i>
              </div>
              <a href="\tasks" class="small-box-footer">More info </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count($users)}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion-android-people"></i>
              </div>
              <a href="\users" class="small-box-footer">More info </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
      </div><!-- /.container-fluid -->
    </section>

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_costom.css">
@endsection