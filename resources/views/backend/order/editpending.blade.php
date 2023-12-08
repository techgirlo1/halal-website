@extends('admin.admin_master')

@section('admin')





<div class="content-body" style="min-height: 788px; background-color:white">
<div class="container-fluid">

<!-- row -->



<h5 class="py-5"><strong><span class="text-danger">Invoice No: {{$order->invoice_no}}<span></strong></h5>
<div class="row">
    
<div class="col-md-6">

            
<div class="card" >
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong><span class='text-dark'>Product Name: {{$order->product_name}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>Product Id: {{$order->product_id}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>Quantity: {{$order->quantity}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>Total price: {{$order->total_price}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>Email: {{$order->email}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>Name: {{$order->name}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>Delivery Address: {{$order->delivery_address}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>State: {{$order->state}}</strong></span></li>
  </ul>
 
</div>

</div>





<div class="col-md-6">

            <form method="post"  action="{{route('insertprofile')}}">
                @csrf
                <div class="card" >
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong><span class='text-dark'>Delivery charge : {{$order->delivery_charge}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>Order Date: {{$order->order_date}}</strong></span></li>
    <li class="list-group-item"><strong><span class='text-dark'>Order Time: {{$order->order_time}}</strong></span></li>
    
    <li class="list-group-item"><strong><span class='text-dark'>Delivery Address: {{$order->delivery_address}}</strong></span></li>

    <li class="list-group-item"><strong><span class='text-dark'>Order Status: </strong></span>
<span class="badge badge-pill" style="background:pink">{{$order->order_status}}</span></li>
  
  
  @if($order->order_status== 'Pending')
  <a href="{{route('pending.process',$order->id)}}" class='btn btn-block btn-success '>Processing Order</a>
 @elseif($order->order_status== 'Processing')
 <a href="{{route('processing.complete',$order->id)}}" class='btn btn-block btn-success'>Complete Order</a>
  @endif
  </ul>
 
</div>

</div>
</div>

@endsection