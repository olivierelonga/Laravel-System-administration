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

                   <form action="{{ route('sale_order.store') }}" method="POST">
                    @csrf

                    <div class="card card-default">
                        <div class="card-header">
                        <h3 class="card-title"><b style="font-size: 25px;">Create Sales Order</b></h3>
                        
                        </div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                            <div class="form-group">
                                <label>Order Reason</label>
                                <input type="text" name="order_reason" class="form-control" placeholder="Order Reason">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="short_description" id="short_description" placeholder="Short decription of the product" maxlength="1000" rows="3" required=""></textarea>
                            </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Fodd Category</label>
                                <select class="form-control" name="food_type" id="food_type" required="">
                                    <option value='0' disabled>Please Select category</option>
                                    @foreach ($food_type as $food_type)
                                    <option value="{{$food_type->id}}">{{$food_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" class="foodcats_">
                                <select id="foodcats" class="form-control" name="foodcats" >
                                </select>
                            </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="number" name="product_price" class="form-control" placeholder="Product Price" required>
                            </div>
                            </div>

                            <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Unit Quantity</label>
                                <div class="form-group">
                                <input type="number" class="form-control" placeholder="Unit Quantity" required>
                                </div>
                            </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" id='send' name='send' onclick="submitForm()" class="btn pull-right btn-primary">Submit</button>
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

  <script>
            function submitForm(){
                var short_description =  $('#food_type').val();
                var foodcats =  $('#foodcats').val();

                if(short_description == ""){
                    alert('Please select Food Category');
                }else(foodcats == '' || foodcats == '0')
                    alert('Please select Food Type');
                
            }

    // display dropdown on selected food category
        $(document).ready(function(){
            $('#foodcats').change(function(){
            var opt = $(this).find('option:selected');
            $('#display_name').val(opt.html());
            });
            $("#foodcats").hide();

        $("#food_type").change(function() {
            $("#foodcats").show();
            var opt = $(this).find('option:selected');
            $('#costText').val(opt.html());

            let drop_id= $(this).val();

        $.ajax({
                type: 'POST',
                url: "{{ url('/get_drop_id') }}",
                data: 'drop_id='+drop_id,
                "_token": "{{ csrf_token() }}",
                // dataType: 'json', //error causing datype of string
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(result) {
                    $("#foodcats").html(result);
                    console.log(opt);
                },
                error: function(result) {
                    console.log(result);

                }
            });

        });

    });
</script>
@endsection
