@extends('layouts.app')

@section('content')
<style>
ul > a {
     text-decoration: none;
}
</style>
<div class="row">
	<div class="col-md-8 col-md-offset-1">
    <h2>User's Complaints</h2>
  <ul class="list-group">
  	@foreach($complainData as $usersComplain)
    @if($usersComplain["user_id"] !=1)
    <a href="/complain/{!! $usersComplain['cid'] !!}" class="compain-redirect">
  	<li class="list-group-item" style="margin-top: 20px;">
         <span>
            {{ substr($usersComplain["complain"],0,50) }}..
         </span>
         <span class="pull-right clsubstr(earfix">
          by
          {{ $usersComplain["username"] }}
          <span>Registered at {{ $usersComplain["created_at"] }}</span>
         </span>
         
  	</li>
  </a>
    @endif
  	@endforeach
  
  </ul>
</div>
</div>
@endsection
<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>