@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     @if(count($user_requests)>0)
         <h1>要望一覧</h1>
         @foreach($user_requests as $index=>$user_request)
             <div class="row list">
                  <div class="list-height">
                      <a href="{{route('user_request.show',['id'=>$user_request->id])}}" class="text-decoration-none">
                          <div class="list-fontsize">要望タイトル{{$user_request->subject}}</div>
                      </a>
                      <a href="{{route('admin.user.show',['id'=>$user_request->user()->first()->id])}}" class="text-decoration-none">
                          <div class="list-fontsize">ユーザー名{{$user_request->user()->first()->name}}</div>
                      </a>
                  </div>
             </div>
         @endforeach
     @else
         <h1>要望がいません</h1>
     @endif
 </div> 
@endsection