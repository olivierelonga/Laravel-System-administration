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

                      <div class="row">
                        <div class="col-sm-12">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="databale_example">
                            <thead>
                              @if($customer->count() > 0 )
                              <br><br>
                                                                  <tr>
                                                                     <th><h5>id</h5></th>
                                                                      <th><h5>Name</h5></th>
                                                                      <th><h5>Address</h5></th>
                                                                      <th><h5>Date Added</h5></th>
                                                                      <th><h5>Username</h5></th>
                                                                      <th><h5>Balance</h5></th>
                                                                      <th><h5>Action</h5></th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        @foreach ($customer as $cust)
                                                                        <tr>
                                                                            <td>{{ $loop->index+1 }}</td>
                                                                            <td>{{$cust->name}}</td>
                                                                            <td>{{$cust->address}}</td>
                                                                            <td>{{Carbon\Carbon::createFromTimeStamp(strtotime($cust->date_created))->diffForHumans()}}</td>
                                                                            <td>{{$cust->username}}</td>
                                                                            <td>R {{$cust->balance ? $cust->balance : "0"}}</td>
                                                                            <td width="30%"><a href="#"  id="myLink"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="updaterecodes(<?php echo $cust->id ?>)">Update User Info</a>
                                                                              <a href="#"  class="btn btn-warning btn-sm" onclick="delete_user(<?php echo $cust->id ?>)">Delete User</a>
                                                                            </td>
                                                                           

                                                                      @endforeach




                                                              @else

                                                              No Customers In The Sytem !

                                                              @endif
                            </tbody>
                        </table>
                        </div>
                      </div>
                </section>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
              
                  <form id="form_delivery_note"  action="{{ url('updateUser/{id}') }}" method="post" enctype="multipart/form-data">
                      @csrf
                                 <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" class="form-control" name="u_name" id="u_name" required>
                                          <br>
              
                                  </div>

                                  <input type="hidden" id="valId" name="valId">

                                  <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" id="address" required>
                                    <br>
        
                                  </div>


                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="pass_w" id="pass_w" required>
                                    <br>
        
                                  </div>


                                  <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="u_name" id="Username" required>
                                    <br>
        
                                  </div>
              
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" onclick="idvalue()" class="btn btn-primary">Update</button>
                          </div>
                   </form>
                  </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    function delete_user(id){
       Swal.fire({
         title: 'Are you sure?',
         text: "You want to delete this User?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, approve!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Submited!',
              'Customer deleted successfully.',
              'success'
              )
              $.ajax({
                type: 'post',
                data: {id: id},
                _token: '{{ csrf_token() }}',
                dataType: 'json',
                url: '{{ url('delete_user') }}/'+id,
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  success: function (data) {
                    console.log(data);
                  },
                  error: function() {
                    console.log(data);
                  }
                });
                setTimeout(function() {location.reload()}, 2500);
              }
            })
          }

    function updaterecodes(valID){
      $("#valId").val(valID);
      // alert(valID);
    }
  </script>
@endsection

