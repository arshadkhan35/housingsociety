@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
  <ul class="list-group">
    @if(!empty($users))
  	@foreach($users as $user)
    @if($user->id !=1)
  	<li class="list-group-item" style="margin-top: 20px;">
         <span>
            {{ $user->name }}
         </span>
         <span class="pull-right clearfix">
          Joined ({{ $user->created_at }})
          <button class="btn btn-xs btn-primary aprov-btn" id="{!! $user->id !!}-uid"> Approve </button> 
         </span>
         
  	</li>
    @endif
  	@endforeach
    @else
    <li class="list-group-item" style="margin-top: 20px;">You have no pending approval!!</li>
    @endif
  </ul>
</div>
</div>
@endsection
<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>
<script>

$(document).ready(function (){
$('.aprov-btn').click(function(){
  var uid = $(this).attr('id');
  var userid = uid.substring(0,1);
$.get('/approve-user?userid='+userid,function(data){
  if(data){
    $('#'+uid).text("Approved");
  }
  console.log(data);
});
});
});


</script>