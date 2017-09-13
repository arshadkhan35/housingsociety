@extends('layouts.app')

@section('content')
<style>
body {
    background-color: #f8f8f8;
}
.profile-pic {
margin: 0 auto;
float: none;
}
span{
    font-size: large;
    font-family: serif;
    font-style: oblique;
    color: #a97737;
}
.notice-container{
border: 1px solid darkgray;
border-radius: 28px;
box-shadow: 10px 10px 5px;
}
.notice-container p {
    padding: 10px;
    color: maroon;
    font-size: small;
    font-family: cursive;
    font-style: italic;
}
h2{
font-size: x-large;
    font-family: serif;
    font-style: oblique;
}
.comment-item{
font-size: inherit;
    font-family: cursive;
    font-stylet: initial;
    font-style: oblique;
}
.numbring{
    padding-right: 5PX;
    color: black;
}
</style>
<div class="container-fluid">
<div class="row">
<div class="col-md-4 profile-pic" >
<span>Complaint</span>
</div>
</div>

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 notice-container">
<p> 
    {!! $complainData['complain_data']['complain'] !!}
</p>
</div>
<div class="col-md-2">by <span>{!! $complainData['complain_data']['username'] !!}<span></div>
</div>
<hr>
<!-- comment section -->
<div class="row">
<div class="col-md-4 profile-pic" >
<h2>Comments:</h2>
<div class="comments">
@foreach($complainData['comment_data'] as $comment)
<span class="numbring">#</span><span class="comment-item">{!! $comment['complain_comment'] !!}</span> By <span> {!! $comment['username'] !!} </span><br>
@endforeach
</div>
<div class="add-comment">
<form action='/add-complain-comment'>
<div class="form-group">
    <label for="exampleInputFile">Add Comment</label>
    <textarea rows="4" cols="50" id="comment" name="comment"></textarea>
    <input type="hidden" name="cid" value="{!! $complainData['complain_data']['cid'] !!}" >
    <button type="submit" class="btn btn-primary upload-primary">Comment</button>
  </div>
</form>
</div>
</div>
</div>
</div>
@endsection