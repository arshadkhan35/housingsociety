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
<form id="bil-generate">
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
  	<a href="javascript:void(0)" class="btn btn-primary" style="width: 100%;" id="generate">Generate Bill</a>
  </form>
  <hr>
  <div class="bill-data" style="display:none;">
  	<h2>Maintainace Bil</h2>
    <div>Month&Year: <span id="bil-month"></span>  &nbsp <span id="bil-year"></span></div>
    <div>Amount: <span id="bil-amount"></span></div>
    <div>Description: <span id="bil-description"></span></div>
  </div>
  <div class="bill-data-msg" style="display:none;">No Record Found!</div>
</div>
<div class="col-md-3" ></div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function (){
  //item select
  
 $("#bil-generate").on('click','#generate',function (){
   var bilmonth = $("#month").val();
   var bilyear = $("#year").val();
   // $("#username").val($(this).text());
     //$("#dropdown").hide();
      $.ajax({
              url:"http://localhost:8000/my-bill-data",
              type: "GET",
              data: {'month': bilmonth,'year':bilyear},
            }).success(function( response ) {
            	console.log(response);
            	if(response != 'nodata'){
            		$("#bil-month").text(response[0].month);
            			$("#bil-year").text(response[0].year);
            			$("#bil-amount").text(response[0].amount);
            			$("#bil-description").text(response[0].description);
            			$(".bill-data").show();
            			$(".bill-data-msg").hide();
            		}else{
            			$(".bill-data").hide();
                       $(".bill-data-msg").show();
            		}
            });
   });
   

});
  
</script>
@endsection