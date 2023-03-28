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
                              @if($invoicesview->count() > 0 )
                              <br><br>
                                                                  <tr>
                                                                     <th><h5>id</h5></th>
                                                                      <th><h5>Description</h5></th>
                                                                      <th><h5>Price</h5></th>
                                                                      <th><h5>Order Reference</h5></th>
                                                                      <th><h5>Status</h5></th>
                                                                      <th><h5>Action</h5></th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        @foreach ($invoicesview as $invoices)
                                                                        <tr>
                                                                            <td>{{ $loop->index+1 }}</td>
                                                                            <td>{{$invoices->description}}</td>
                                                                            <td>{{$invoices->amount}}</td>
                                                                            <td>R {{$invoices->sales_reference}}</td>
                                                                            <td>
                                                                                @if($invoices->status === 1)
                                                                                <a href="#" class="btn btn-success btn-xs" >Settled</a>
                                                                                @else
                                                                                <a href="#" class="btn btn-danger btn-xs" >Not Settled</a>
                                                                                @endif
                                                                            </td>
                                                                            <td width="30%">
                                                                              <a href="{{url('invoiceView', ['id' => $invoices->id])}}"  class="btn btn-success btn-sm" onclick="pass_id({{ $invoices->id }})"> <i class="fa fa-eye">  View Invoice </i></a>
                                                                                {{-- @if(!in_array($invoices->id, $shift)) --}}
                                                                                <?php $sum = 0; ?>
                                                                                @if($invoices->status != 1)
                                                                                <a href="#"  id="myLink"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticBackdrop" onclick="sendData('<?php echo $invoices->id?>', '<?php echo $invoices->amount?>', '<?php echo $invoices->balance?>', '<?php $sum+= $invoices->amount * 1 ?>{{$invoices->amount * 1}}')"> <i class="fa fa-credit-card"></i> Make Payment </a>
                                                                                @endif
                                                                                {{-- @endif --}}
                                                                            </td>
                                                                           

                                                                      @endforeach




                                                              @else

                                                              No Invoice found !

                                                              @endif
                            </tbody>
                        </table>
                        </div>
                      </div>
                </section>

                {{--  --}}
                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                          <div class="text-right">
                            <i class="fa fa-close close" data-dismiss="modal"></i>
                          </div>
                          <div class="tabs mt-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="visa-tab" data-toggle="tab" role="tab" aria-selected="true">
                                </a>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                                <div class="mt-4 mx-4">
                                  <div class="text-center">
                                    <h5>Payment System</h5>
                                  </div>
                                  <div class="form mt-3">
                                   <form action="{{ route('payment.store') }}" method="POST">
                                    @csrf
                                      <div class="inputbox">
                                          <label for="">Balance</label>
                                        <input type="text" name="name" class="form-control" id="balance" disabled>
                                      </div>
                                      <div class="inputbox">
                                          <label for="">Amount Due</label>
                                        <input type="text" name="name" min="1" max="999" id="amountdue" class="form-control" disabled>
                                      </div>
                                      <div class="d-flex flex-row">
                                        <div class="inputbox">
                                          <input type="text" name="amount" min="1" max="999" class="form-control" required="required">
                                          <input type="hidden" name="invoice_id" id="invoice_id" max="999" class="form-control">
                                          <span>Enter Amount</span>
                                        </div>
                                      </div>
                                      <div class="px-5 pay">
                                        <button class="btn btn-success btn-block">Make Payment</button>
                                      </div>
                                    </div>
                                </form>
                                </div>
                              </div>
                              <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
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
    function sendData(valueId, val2, valadded, val3){
        // alert(val3)
        $("#invoice_id").val(valueId);
        $("#amount").val(val2);
        $("#amountdue").val(val3);
        $("#balance").val(valadded);
    }
</script>
@endsection

