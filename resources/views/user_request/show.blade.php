@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     <div>{{$user_request->subject}}</div>
     <div>{{$user_request->requests}}</div>
     
     <form method="post" action="{{route('user_request.delete',['id'=>$user_request->id])}}">
	    @csrf
	    <input type="submit" class="btn btn-danger" value="削除" />
     </form>
 </div>
@endsection