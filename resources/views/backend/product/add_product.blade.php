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
        <h4 class="card-title">Add Product</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form method="post"  action="{{route('insert_product')}}" enctype="multipart/form-data">
                @csrf
                


                <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control input-default " name="desc"   ></textarea>
                    @error('desc')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>


                <div class="form-group">
                    <label>Producy Price</label>
                    <input type="number" class="form-control input-default " name="price">
                    @error('price')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                </div>
                
                
                
                <div class="form-group">
                <label>Upload Image</label>
                <div class="input-group-prepend">
                    
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img">
                    <label class="custom-file-label">Choose file</label>
                </div>
                @error('img')
                    <span class="text-danger">{{$message}}</span> 
                    @enderror
                
               </div>

                <button type="submit" class="btn btn-success">Add Product</button>
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
    $('#skill').summernote({
        height: 400
    });
</script>



@endsection