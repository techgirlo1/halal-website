
@extends('admin.admin_master')

@section('admin')

<div class="content-body" style="min-height: 788px; background-color:white">
<div class="container-fluid">
<!-- Add contact -->
<div class="modal fade" id="addcontactSidebar">
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
            <h4 class="card-title">All Messages</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            
                           
                            <th><strong>name</strong></th>
                            <th><strong>email</strong></th>
                            <th><strong>message</strong></th>
                           
                        
                        </tr>
                    </thead>
                    <tbody style="color:white">
                        
                        @foreach($contact as $contacts)
                        <tr>
                          
                            
                            
                            <td>{{$contacts->name,20  }}</td>
                            <td> {{ $contacts->email,20  }}</td>
                            <td> {{ $contacts->message,20  }}</td>
                            
                            <td>
                                <div class="d-flex">
                                    
                                    <a href="{{url('/contact/delete/'.$contacts->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $contact->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

  
</div>
</div>
</div>
</div>

@endsection