@extends('layouts.customer-dash-layout')

@section('title', 'Dashboard')

@section('content')
{{-- <script>
  function bsdjc(){
    alert()
  }
</script> --}}
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
                              @if($sales_orders->count() > 0 )
                              <br><br>
                                                                  <tr>
                                                                     <th><h5>id</h5></th>
                                                                      <th><h5>Description</h5></th>
                                                                      <th><h5>Article</h5></th>
                                                                      <th><h5>Price</h5></th>
                                                                      <th><h5>Order Reference</h5></th>
                                                                      <th><h5>Action</h5></th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        @foreach ($sales_orders as $sales_orders)
                                                                        <tr>
                                                                            <td>{{ $loop->index+1 }}</td>
                                                                            <td>{{$sales_orders->description}}</td>
                                                                            <td>{{$sales_orders->food_category}}</td>
                                                                            <td>R {{$sales_orders->u_price}}</td>
                                                                            <td>{{$sales_orders->sales_ref}}</td>
                                                                            <td width="30%">
                                                                              {{-- @if(!in_array($sales_orders->id, $shift)) --}}
                                                                            <a href="#"  id="myLink"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="sendData('<?php echo $sales_orders->id  ?>', '<?php echo $sales_orders->sales_ref ?>', '<?php echo $sales_orders->u_price  ?>')"> <i class="fa fa-book"></i> Capture Invoice</a>
                                                                            {{-- @endif --}}
                                                                            </td>
                                                                           

                                                                      @endforeach




                                                              @else

                                                              No Sales Order found !

                                                              @endif
                            </tbody>
                        </table>
                        </div>
                      </div>
                </section>

                {{--  --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Capture Invoice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('invoices.store') }}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Reference</label>
                            <input type="text" class="form-control" name="sales_reference" id="sales_ref" readonly>
                          </div>
                          
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price</label>
                            <input type="text" class="form-control" name="amount" id="amount" readonly>
                          </div>

                            <input type="hidden" class="form-control" name="sale_id" id="sale_id" readonly>

                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="description" id="description" required></textarea>
                          </div>
                          <div id="alert_danger" class="alert alert-danger alert-dismissible" style="display: none;"></div>
                          
                        <input type="submit" class="btn btn-success" id="click" value="Add More Items Cart">
                        <br><br>
                        <div id="alert_success" class="alert alert-success alert-dismissible" style="display: none;"></div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Capture Invoice</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                {{--  --}}

            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <script>
    function sendData(valueId, val2, val3){
        // alert(val3)
        $("#sale_id").val(valueId);
        $("#sales_ref").val(val2);
        $("#amount").val(val3);
    }

    function dhvbjh(){
      // alert()
    }
    
    $('#click').on("click", function(event){
        event.preventDefault();
        var sales_ref = $('#sales_ref').val();
        var item_price = $('#item_price').val();
        var amount = $('#amount').val();
        const _token  = $('meta[name="csrf-token"]').attr('content');
        var ref = $('#sp_ref2').val();

              if (sales_ref == "") {
              $("#alert_danger").show().html("Enter Description");
              setInterval(function() {$("#alert_danger").fadeOut();}, 5000);

              } else {

        $.ajax({
          url: "{{ url('/invoiceItem') }}",
          type:"POST",
          data:{
            _token: _token,
            amount:amount,
            sales_ref :sales_ref
          },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          // formElement:form,
          success: function(response){
            console.log('response', response);
            $("#alert_success").show().html("Item Added");
            setInterval(function(){ $("#alert_success").fadeOut(); }, 2000);
          },error:function(err){
            $("#alert_danger").show().html("Sorry your item wasn't added");
            $("#alertz").show().html("Make sure all fields are entered");
            setInterval(function(){ $("#alert").fadeOut(); }, 6000);
            console.log('error', err);
            // alert("error!");
          },
         });
        }
});
</script>
@endsection

