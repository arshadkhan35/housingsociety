@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
  <ul class="list-group">
    @if(!empty($hallData))
  	@foreach($hallData as $data)
    @if($data["user_id"] !=1)
  	<li class="list-group-item" style="margin-top: 20px;">
         <span>
            {{ $data['username'] }}
         </span>
         <span>
          FROM:
            {{ date('d-m-Y',$data['from']) }}
         </span>
         <span>
          TO:
            {{ date('d-m-Y',$data['to']) }}
         </span>
         <span class="pull-right clearfix">
          <a class="btn btn-xs btn-primary aprov-btn" href="/hall-requests-approve?rid={!! $data['rid'] !!}&operation=approve"> Approve </a> 
         </span>
         <span class="pull-right">
          <a class="btn btn-xs btn-primary aprov-btn" href="/hall-requests-approve?rid={!! $data['rid'] !!}&operation=cancel"> Cancel </a>
         </span>
  	</li>
    @endif
  	@endforeach
    @else
    <li class="list-group-item" style="margin-top: 20px;">
      No pending request!!
    </li>
  @endif
  </ul>
</div>
</div>
@endsection
<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>
