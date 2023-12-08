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
        <form>
            
            <div class="form-group">
                <label class="text-black font-w500">Project Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label class="text-black font-w500">Deadline</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group">
                <label class="text-black font-w500">Client Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary">CREATE</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<!-- row -->
<div class="row">
<div class="col-xl-6 col-lg-6">
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Change Password</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{route('changepassword')}}">
                @csrf
                <div class="form-group">
                    <label for="current_password" class="info-title">Current Password</label>
                    <input  type="password"  class="form-control input-default" id="current_password"  name="current_password" >
                    @error('current_password')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>



                <div class="form-group">
                    <label for="password" class="info-title">New Password</label>
                    <input  type="password" class="form-control input-default" id="password" name="password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>



                <div class="form-group">
                    <label for="password_confirmation" class="info-title">Confirm Password</label>
                    <input id="password_confirmation" type="password"  name="password_confirmation" class="form-control input-default" id="current_password" type="password">
                    @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
             <button type="submit" class="btn btn-success">Change Password</button>
            </form>
        </div>
    </div>
</div>
</div>


@endsection