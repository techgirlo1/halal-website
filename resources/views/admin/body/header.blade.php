<!--**********************************
Nav header start
***********************************-->
<div class="nav-header" style="background-color:black">
<a href="{{route('dashboard')}}" class="brand-logo">

<h5>Halal Wears</h5>
</a>

<div class="nav-control" style="background-color:black">
<div class="hamburger">
<span class="line"></span><span class="line"></span><span class="line"></span>
</div>
</div>
</div>
<!--**********************************
Nav header end
***********************************-->



<!--**********************************
Header start
***********************************-->
<div class="header" style="background-color:black">
<div class="header-content">
<nav class="navbar navbar-expand">
<div class="collapse navbar-collapse justify-content-between">
<div class="header-left">
<div class="input-group search-area right d-lg-inline-flex d-none">

<!-- <div class="input-group-append">
    <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
</div> -->
</div>
</div>
<ul class="navbar-nav header-right main-notification">

<li class="nav-item dropdown header-profile">

<a href="{{url('logout')}}">
        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
        <span class="ml-2">Logout </span>
    </a>

        @php
        $id=Auth::user()->id;
        $user_details=App\Models\User::find($id);
        @endphp


<a class="nav-link" href="#" role="button" data-toggle="dropdown">
    <img src="{{(!empty($user_details->profile_photo_path))?url('upload/userimages/'.$user_details->profile_photo_path):url('upload/no_image.jpg')}}"  width="20" alt=""/>
    <div class="header-info">
        <span>{{$user_details->name}}</span>
        <small>Super Admin</small>
    </div>
</a>

</li>
</ul>
</div>
</nav>
</div>
</div>