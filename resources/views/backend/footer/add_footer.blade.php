@extends('admin.admin_master')

@section('admin')





<div class="content-body" style="min-height: 788px; background-color:white">
<div class="container-fluid">
<!-- Add Project -->
<div class="modal fade" id="addProjectSidebar">
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

</div>

</div>
<!-- row -->
<div class="row">
<div class="col-xl-12 col-lg-12">
<div class="card" style=" background-color:black">
    <div class="card-header">
        <h4 class="card-title">Add Footer</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{route('insert_footer')}}">
                @csrf

                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control input-default " name="address"></textarea>
                    @error('address')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>




                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control input-default " name="phone">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control input-default " name="email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Linkden Link</label>
                    <input type="text" class="form-control input-default " name="link">
                    @error('link')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Behance Link</label>
                    <input type="text" class="form-control input-default " name="be">
                    @error('be')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Instagram Link</label>
                    <input type="text" class="form-control input-default " name="insta">
                    @error('insta')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>



                <div class="form-group">
                    <label>Privacy</label>
                    <textarea class="form-control input-default " name="privacy"></textarea>
                    @error('privacy')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Refund</label>
                    <textarea class="form-control input-default " name="refund"></textarea>
                    @error('refund')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>



                <div class="form-group">
                    <label>Terms</label>
                    <textarea class="form-control input-default " name="terms"></textarea>
                    @error('terms')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-success">Add Footer</button>
            </form>
        </div>
    </div>
</div>
</div>



@endsection