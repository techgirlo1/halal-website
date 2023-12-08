@extends('admin.admin_master')

@section('admin')

<div class="content-body" style="min-height: 788px; background-color:white" >
<div class="container-fluid">
<!-- Add about -->
<div class="modal fade" id="addaboutSidebar">
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
            <h4 class="card-title">ALL ABOUT</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            <th><strong>image</strong></th>
                            <th><strong>desc</strong></th>
                            <th><strong>who_we_are</strong></th>
                            <th><strong>mission</strong></th>
                            <th><strong>vision</strong></th>
                        
                        </tr>
                    </thead>
                    <tbody style="color:white">
                        
                        @foreach($about as $abouts)
                        <tr>
                          
                            <td><img src="{{asset($abouts->image)}}" style="height:100px;width:100px"/></td>
                            
                            <td>{{$abouts->desc,20  }}</td>
                            <td> {{ $abouts->who_we_wre	,20  }}</td>
                            <td>{{$abouts->mission,20  }}</td>
                            <td> {{ $abouts->vision,20  }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/about/edit/'.$abouts->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/about/delete/'.$abouts->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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