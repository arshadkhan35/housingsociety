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
#dropdown {
    background-color: white;
    border: 1px solid white;
    box-shadow: 1px 1px 1px darkgray;
}
.itemselect {
    list-style: none;
    font-size: inherit;
    font-style: oblique;
    font-family: sans-serif;
}
hr {
    margin-top: 2px;
    margin-bottom: 2px;
    border: 0;
    border-top: 1px solid #eee;
}
ul{
  margin-left: -33px;
}

</style>
<div class="container-fluid">
<div class="row">
<div class="col-md-4 profile-pic" >
<span> Generate Maintainance Bill</span>
</div>
</div>
<div class="row">
<div class="col-md-3" ></div>
<div class="col-md-6" >
<form action="/saveGenerateBill" method="GET">
<div class="form-group">
    <input type="text" class="form-control" id="username" name="username" placeholder="Full Name" autocomplete="off" required >
  <div id="dropdown" style="display:none;">
             <ul id="auto-complete">
             
             </ul>
      </div>
  </div>
    

  <div class="form-group">
    <span>Month:</span>
    <select name="month" id="month" required>
      <option>Jan</option><option>Feb</option><option>March</option><option>April</option>
      <option>May</option><option>June</option><option>July</option><option>Agust</option>
      <option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
    </select>
  </div>
  <div class="form-group" required>
    <span>Year:</span>
    <select name="year" id="year">
      <option>2017</option><option>2018</option><option>2019</option><option>2020</option>
      <option>2021</option><option>2022</option><option>2023</option><option>2024</option>
      <option>2025</option><option>2026</option><option>2027</option><option>2028</option>
    </select>
  </div>
  <div class="form-group">
    <input type="number" class="form-control" id="amount" name="amount" placeholder="bill amount" required>
  </div>
  <div class="form-group">
    <textarea rows="4" cols="90" id="comment" name="description" placeholder="bill description.."></textarea>
  </div>
  	<button type="submit" class="btn btn-primary" style="width: 100%;" id="generate">Generate Bill</button>
  </form>
</div>
<div class="col-md-3" ></div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function (){
  //item select
  
  //bulk upload implementation equity
   $("#username").keydown(function (){
    var name = $("#username").val();
    var list = '';
    console.log(name.length);
    if(name.length > 2){
      $.ajax({
              url:"http://localhost:8000/get-useData",
              type: "GET",
              data: {'inputText': name},
            }).success(function( data ) {
              if(data){
                $.each(data, function (key, val) {
                  list +=  "<li class='itemselect'>" + val.name +"-"+ val.id +  "</li><hr>"
              });
              }
                $("#auto-complete").html(list);
               $("#dropdown").show();
              console.log(data);
            });
      
    }else{
      $("#dropdown").hide();
    }
   });
 $("#dropdown").on('click','.itemselect',function (){
   console.log("clcik");
    $("#username").val($(this).text());
     $("#dropdown").hide();
   });
   

});
  
</script>
@endsection