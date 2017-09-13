@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-4 profile-pic col-md-offset-4" >
<span>Book Hall</span>
</div>
</div>
<div class="row">
<div class="col-md-6 col-md-offset-3" >
<form action="/booking-hall" method="GET">
  <div class="form-group">
  	<lable>From:</label>
    <input type="date" name="from_date" required >
  </div>
  <div class="form-group">
  	<lable>To:</label>
    <input type="date" name="to_date" required >
  </div>
  
  	<button type="submit" class="btn btn-primary" style="width: 100%;">Book</button>
  </form>
</div>
</div>
@endsection