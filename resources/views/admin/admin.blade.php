@extends('layouts.app')

@section('content')
 <h>管理画面</h>
 <div>
     @if (count($users) > 0)
         @foreach($users as $user)
             <div>{{$user->name}}</div>
             <div>{{$user->email}}</div>
         @endforeach
     @else
         <h>ありません</h>
     @endif
 </div> 
   
 {!! link_to_route('admin.aa', 'aa') !!}
 {!! link_to_route('admin.adminField', 'field') !!}
 {!! link_to_route('admin.plantType', 'plantType') !!}
 {!! link_to_route('admin.instructons', 'instructons') !!}
@endsection