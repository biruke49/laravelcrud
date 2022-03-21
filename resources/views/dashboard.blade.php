@extends('adminlte')
 @section('content')
 @if(\Session::has('message'))
 <div class="alert alert-danger">
    {{!! \Session::get('message') !!}}
 </div>

 @endif
 <p style="font-size:50px;margin-left:25%;margin-top:20%;"><strong>Welcome To Your Admin Panel </strong></p>

@endsection
