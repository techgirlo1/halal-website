<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Halal Wears Admin Dashboard </title>
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/images/favicon.png')}}">
<link href="{{asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100" style="background-color:black">
<div class="authincation h-100">
<div class="container h-100">
<div class="row justify-content-center h-100 align-items-center" >
<div class="col-md-6">
<div class="authincation-content">
<div class="row no-gutters">
<div class="col-xl-12" style="background-color:white">
    <div class="auth-form">
        <div class="text-center mb-3">
            <h1>Halal Wears</h1>
        </div>
        <h4 class="text-center mb-4">Sign up your account</h4>
        <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="form-group">
                <label class="mb-1"><strong>Username</strong></label>
                <input type="text" id="name"  name="name"  class="form-control" placeholder="username">
            </div>
            <div class="form-group">
                <label class="mb-1"><strong>Email</strong></label>
                <input type="email"  id="email"  name="email" class="form-control" placeholder="hello@example.com">
            </div>
            <div class="form-group">
                <label class="mb-1"><strong>Password</strong></label>
                <input type="password" class="form-control"  id="password"  name="password" value="Password">
            </div>

            <div class="form-group">
                <label class="mb-1"><strong>Confirm Password</strong></label>
                <input type="password"   id="password_confirmation"  name="password_confirmation" class="form-control" value="Password">
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
            </div>
        </form>
        <div class="new-account mt-3">
            <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a></p>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!--**********************************
Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('backend/vendor/global/global.min.js')}}
"></script>
<script src="{{asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}
"></script>
<script src="{{asset('backend/js/custom.min.js')}}
"></script>
<script src="{{asset('backend/js/deznav-init.js')}}
"></script>

</body>
</html>