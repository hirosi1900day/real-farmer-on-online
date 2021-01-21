@extends('layouts.app')

@section('content')
 <div class="background-skyblue">
     @if(count($chat_rooms)>0)
         <h1>チャットユーザー一覧</h1>
         @foreach($chat_rooms as $index=>$chat_room)
              @if($notification[$index]==false)
             <div class="row list">
                  <div class="list-height">
                      <a href="{{route('chat.view',['id'=>$chat_room->id])}}" class="text-decoration-none">
                          <div class="list-fontsize">{{$users[$index]->name}}</div>
                      </a>
                  </div>
             </div>
             @endif
         @endforeach
         
     @else
         <h1>チャットユーザーがいません</h1>
     @endif
 </div> 
@endsection