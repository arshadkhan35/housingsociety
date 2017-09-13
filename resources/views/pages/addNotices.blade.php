@extends('layouts.app')

@section('content')
<style>
.add-text{
	font-size: -webkit-xxx-large;
    font-family: -webkit-pictograph;
    font-style: italic;
}
#notice-desc {
 box-shadow: 5px 5px 5px darkgrey;
}

</style>
<div class="row">
<div class="col-md-6 col-md-offset-3 profile-pic" >
<span class="add-text">Add Notice  </span>
</div>
</div>
<div class="row">
<div class="col-md-6 col-md-offset-3" >
<form action="/save-notice" method="GET">
  <div class="form-group">
    <textarea id="notice-desc" name="comment-desc" rows="4" cols="50">
</textarea>
  </div>
  <div class="form-group">
  	<button type="submit" class="btn btn-primary">save</button>
  	</div>
  </form>
</div></div>
@endsection