@extends('admin.admin_master')

@section('admin')

<div class="content-body" style="min-height: 788px; background-color:white">
<div class="container-fluid">
<!-- Add order -->
<div class="modal fade" id="addorderSidebar">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
           
        </div>
        <div class="modal-body">
            
        </div>
    </div>
</div>
</div>
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
    <div class="welcome-text">
        
    </div>
</div>

</div>
<!-- row -->

<div class="row">
<div class="col-lg-12">
    <div class="card" style=" background-color:black">
        <div class="card-header">
            <h4 class="card-title">Processing Orders</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            
                           
                            <th><strong>Product Name</strong></th>
                            <th><strong>Invoice no</strong></th>
                            <th><strong>Quantity</strong></th>
                            <th><strong>Total Price </strong></th>
                            <th><strong>Order Date</strong></th>
                            <th><strong>Order Status</strong></th>
                            
                            
                           
                        
                        </tr>
                    </thead>
                    <tbody style="color:white">
                        
                        @foreach($order as $orders)
                        <tr>
                          
                            
                            
                            <td>{{$orders->product_name  }}</td>
                            <td> {{ $orders->invoice_no  }}</td>
                            <td> {{ $orders->quantity  }}</td>
                            <td> {{ $orders->total_price  }}</td>
                            <td> {{ $orders->order_date }}</td>
                            <td> <strong><span class='text-danger'>{{ $orders->order_status  }}</span></strong></td>
                            
                            
                            <td>
                                <div class="d-flex">
                                <a href="{{url('order/pendingstatus/'.$orders->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                </div>
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
</div>
</div>
</div>

@endsection