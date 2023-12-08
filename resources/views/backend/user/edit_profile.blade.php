@extends('admin.admin_master')

@section('admin')





<div class="content-body" style="min-height: 788px; background-color:white">
<div class="container-fluid">
<!-- Add Project -->
<div class="modal fade" id="addProjectSidebar">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Create Project</h5>
        <button type="button" class="close" data-dismiss="modal"><span>×</span>
        </button>
    </div>
    <div class="modal-body">
        
    </div>
</div>
</div>
</div>
<div class="row page-titles mx-0">
<div class="col-sm-6 p-md-0">
<div class="welcome-text">
    <h4>Hi,{{$user_details->name}} welcome back!</h4>

</div>
</div>

</div>
<!-- row -->
<div class="row">
<div class="col-xl-6 col-lg-6">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Profile</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{route('insertprofile')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control input-default " name="name" value="{{$user_details->name}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email"  value="{{$user_details->email}}">
                    @error('email')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="photo">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            @error('photo')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success">Edit Profile</button>
            </form>
        </div>
    </div>
</div>
</div>


@endsection