@extends('layouts.app')

@section('content')
<style>
body {
    background-color: #f8f8f8;
}
.row{
margin-top: auto;
}
.img-rounded {
    border-radius: 6px;
    border: 1px solid lightblue;
}
.profile-pic {
margin: 0 auto;
float: none;
}
.upload-btn {
    float: right;
    position: relative;
    top: -30px;
    left: -33px;
}
span {
    font-size: large;
    font-family: -webkit-pictograph;
    font-style: normal;
}
</style>
<div class="container-fluid">
<div class="row">
<div class="col-md-4 profile-pic" >
<img src="images/{!! $userdata['uri'] !!}" class="img-rounded" alt="Cinque Terre" width="270" height="236" />
<div>
<form action="add-profilePic" enctype="multipart/form-data" method="POST">
<div class="form-group">
    <label for="exampleInputFile">Upload Profile </label>
    <input type="file" id="exampleInputFile" name="profileImage">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit"  value="Upload" class="btn btn-primary upload-btn">
	<!--<button class="btn btn-default upload-btn" id="uploadsubmit">Upload</button> -->
  </div>
</form>
</div>
</div>
</div>
<hr>

<div class="row">
<div class="col-md-4 profile-pic" >
<span>Enter Personal Details </span>
</div>
</div>
<div class="row">
<div class="col-md-3" ></div>
<div class="col-md-6" >
<form action="save-userDetails" method="GET">
<div class="form-group">
    <input type="text" class="form-control" id="username" name="username" placeholder="Full Name" value="{!! $userdata['fullName'] !!}" required >
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="mobile" name="mobile" value="{!! $userdata['mobileno'] !!}" placeholder="Mobile Number" >
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" value="{!! $userdata['email'] !!}" placeholder="Email">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="buildingNumber" name="buildingNumber" value="{!! $userdata['buildingno'] !!}" placeholder="Building Number">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="wing" name="wing" placeholder="Wing" value="{!! $userdata['wing'] !!}" required >
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="floor" name="floor" placeholder="Floor" value="{!! $userdata['Floor'] !!}" required >
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="roomNumber" name="roomNumber" value="{!! $userdata['roomno'] !!}" placeholder="Room Number" required >
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="fatherName"  name="fatherName"value="{!! $userdata['fatherName'] !!}"  placeholder="Father/Husband Name" >
  </div>
  	<button type="submit" class="btn btn-primary" style="width: 100%;">save</button>
  </form>
</div>
<div class="col-md-3" ></div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>

  //bulk upload implementation equity
   $("#uploadsubmit").click(function (){
       alert(1);
// var fd = new FormData(document.getElementById("profileImage"));
//            fd.append("name", "equity");
//             $.ajax({
//               url:"http://localhost:8000/add-profilePic",
//               type: "GET",
//               data: fd,
//               processData: false,  // tell jQuery not to process the data
//               contentType: false   // tell jQuery not to set contentType
//             }).done(function( data ) {
              
//             });
//    });
</script>
@endsection