@extends('layouts.admin-dash-layout')

@section('title', 'Dashbaord')

@section('content')



                <section class="content">
                    <div class="container-fluid">
                        @if(session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i>Great !</h4>
                            {{session('message')}}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                            </div>
                        @endif

                   <form action="{{ url('AddCustomers') }}" autocomplete="off" method="POST">
                    @csrf

                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title"><b style="font-size: 25px;">Add User To Syatem</b></h3>
                        
                        </div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="ur_name" id="ur_name" class="form-control" placeholder="Name" required>
                            </div>

                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="upass" class="form-control" placeholder="Password" required>
                            </div>
                            </div>

                            <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                            </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn pull-right btn-primary" style="float: right;">Add Customer</button>
                            </div>
                            
                        </div>
                        </div>
                
                    </div>
                   </form>
                </section>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
