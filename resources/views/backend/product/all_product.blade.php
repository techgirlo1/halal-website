@extends('admin.admin_master')

@section('admin')

<div class="content-body" style="min-height: 788px; background-color:white">
<div class="container-fluid">
<!-- Add product -->
<div class="modal fade" id="addproductSidebar">
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
            <h4 class="card-title">ALL PRODUCT</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            
                            <th><strong>prod_desc</strong></th>
                            <th><strong>prod_price</strong></th>
                            <th><strong>prod_image</strong></th>
                           
                        
                        </tr>
                    </thead>
                    <tbody style="color:white">
                        
                        @foreach($product as $products)
                        <tr>
                          
                            <td>{{$products->prod_desc  }}</td>
                            <td>{{$products->prod_price  }}</td>
                            <td><img src="{{asset($products->prod_image)}}" style="height:100px;width:100px"/></td>
                            
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/product/edit/'.$products->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/product/delete/'.$products->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                    
                </table>
                {{ $product->links('pagination::bootstrap-4') }}
            </div>
        </div>
        
    </div>
</div>

@endsection