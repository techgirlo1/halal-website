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
        <h4 class="card-title">Update About</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{url('/about/edit_about/'.$about->id)}}" enctype="multipart/form-data">
                @csrf



           <input type="hidden" name="old_image" value="{{$about->image}}">
                <div class="form-group">
                    <label>About Description</label>
                    <textarea class="form-control input-default " name="desc" >{{$about->desc}}</textarea>
                    @error('desc')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload </span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img">
                    <label class="custom-file-label">Choose file</label>
                </div>
                @error('img')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                    </div>


                <div class="form-group">
                    <label>Who We Are</label>
                    <textarea class="form-control input-default " name="who"   >{{$about->who_we_wre}}</textarea>
                    @error('who')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                
                
                <div class="form-group">
                    <label>Vision</label>
                    <textarea class="form-control input-default " name="vision"  >{{$about->vision}}</textarea>
                    @error('vision')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Mission</label>
                    <textarea class="form-control input-default " name="mission">{{$about->mission}}</textarea>
                    @error('mission')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


               


                   

                                        <button type="submit" class="btn btn-success">Update About</button>
            </form>
        </div>
    </div>
</div>
</div>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#desc').summernote({
        height: 400
    });
</script>

<script type="text/javascript">
    $('#feature').summernote({
        height: 400
    });
</script>



@endsection