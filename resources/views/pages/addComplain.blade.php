@extends('layouts.app')

@section('content')
<style>
.add-text{
	font-size: -webkit-xxx-large;
    font-family: -webkit-pictograph;
    font-style: italic;
}
#complain-desc {
 box-shadow: 5px 5px 5px darkgrey;
}
.complain-btn {
	width: 56%;
}
</style>
<div class="row">
<div class="col-md-4 profile-pic col-md-offset-4" >
<span class="add-text">Add Complain  </span>
</div>
</div>
<div class="row">
<div class="col-md-6 col-md-offset-3" >
<form action="/save-complain" method="GET">
  <div class="form-group">
    <textarea id="complain-desc" name="complainDesc" rows="4" cols="50">

</textarea>
  </div>
  <div class="form-group">
  	<button type="submit" class="btn btn-primary complain-btn">Complain</button>
   </div>
  </form>
  </div>
</div>

@endsection