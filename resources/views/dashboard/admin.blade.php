@extends('template')


@section('styles')

</style>

@stop

@section('main')
<?php $page_name = 'Dashboard' ?>

  <div class="row small-spacing">
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content">
          <div class="statistics-box with-icon">
            <i class="ico fa fa-users text-inverse"></i>
            <h2 class="counter text-inverse">0</h2>
            <p class="text">All users</p>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content">
          <div class="statistics-box with-icon">
            <i class="ico fa fa-user-secret text-success"></i>
            <h2 class="counter text-success">0</h2>
            <p class="text">Administrators</p>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content">
          <div class="statistics-box with-icon">
            <i class="ico fa fa-briefcase text-primary"></i>
            <h2 class="counter text-primary">0</h2>
            <p class="text">Clients</p>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content">
          <div class="statistics-box with-icon">
            <i class="ico fa fa-sitemap text-info"></i>
            <h2 class="counter text-info">0</h2>
            <p class="text">Programmes</p>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
    </div>
    <!-- .row -->

    <div class="row small-spacing">
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content bg-primary text-white">
          <div class="statistics-box with-icon">
            <i class="ico small fa fa-user-plus"></i>
            <p class="text text-white">New Users</p>
            <h2 class="counter">0</h2>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content bg-success text-white">
          <div class="statistics-box with-icon">
            <i class="ico small mdi mdi-account-check"></i>
            <p class="text text-white">Confirmed Users</p>
            <h2 class="counter">0</h2>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content bg-warning text-white">
          <div class="statistics-box with-icon">
            <i class="ico small mdi mdi-account-alert"></i>
            <p class="text text-white">Inactive Users</p>
            <h2 class="counter">0</h2>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box-content bg-danger text-white">
          <div class="statistics-box with-icon">
            <i class="ico small fa fa-user-times"></i>
            <p class="text text-white">Banned Users</p>
            <h2 class="counter">0</h2>
          </div>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-lg-3 col-md-6 col-xs-12 -->
    </div>
    <!-- .row -->


@stop

@section('scripts')

@stop

