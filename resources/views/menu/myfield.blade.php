@extends('layouts.app')

@section('content')
<div class="background-skyblue"> 
      @if(count($fields)>0)
      @foreach($fields as $index=>$field)
          <div class="index-container">
              <div class="text-title" style="text-decoration: underline">畑の名前</div>
              <div>{{$adminField[$index]->field_name}}</div>
              </br>
          </div>
      @endforeach
      @else
      <div class="text-title">畑がありません</div>
      @endif
</div>
@endsection