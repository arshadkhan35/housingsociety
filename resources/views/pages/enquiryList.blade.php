@extends('layouts.app')

@section('content')
<style>
ul > a {
     text-decoration: none;
}
</style>
<div class="row">
	<div class="col-md-8 col-md-offset-1">
    <h2>User's Enquiriese</h2>
  <ul class="list-group">
    <li class="list-group-item" style="margin-top: 20px;">
         <span>
            <b>Name</b>
         </span>&nbsp;&nbsp;&nbsp;&nbsp;
         <span>
            <b>Email</b>
         </span>
         <span class="pull-right clsubstr(earfix">
         <b> Mobile No.</b> &nbsp;&nbsp;&nbsp;&nbsp;
          <span><b>Registered at</b></span>
         </span>
         
    </li>
  	@foreach($enquiries as $enquiry)
  	<li class="list-group-item" style="margin-top: 20px;">
         <span>
            {{ $enquiry['name'] }}
         </span>&nbsp;&nbsp;&nbsp;&nbsp;
         <span>
            {{ $enquiry['email'] }}
         </span>
         <span class="pull-right clsubstr(earfix">
          {{ $enquiry['mobile_no'] }}&nbsp;&nbsp;
          <span>{{ $enquiry["created_at"] }}</span>
         </span>
         
  	</li>

  	@endforeach
  
  </ul>
</div>
</div>
@endsection
<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>