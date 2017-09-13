@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
	<h2>My Request</h2>
<table class="table">
<tr>
<th>From Date</th>
<th>To Date</th>
<th>Status</th>
</tr>
@if(!empty($bookingRequest))
@foreach($bookingRequest as $hallRequest)
<tr>
<td>{!! date('m-d-Y',$hallRequest['from']) !!}</td>
<td>{!! date('m-d-Y',$hallRequest['to']) !!}</td>
@if($hallRequest['is_approved'] == 0)
<td>Pending</td>
@elseif($hallRequest['is_approved'] == 1)
<td>Approved</td>
@else
<td>Cancelled</td>
@endif
</tr>


@endforeach
@else
<tr><td>You have no Request</td></tr>
@endif
</table>
</div>
</div>
@endsection