@extends('layouts.app')

@section('content')
  <div class="background-skyblue">
      <h1>種を追加する</h1>
      <form action="{{ route('user.menu.plant') }}" method="POST">
          {{ csrf_field() }}
          <p>指示を追加する畑（複数回答不可）: 
            　@foreach($fields as $index=>$field)
                <div class="index-container shadow">
                    <input type="radio" id="anId4{{$index}}" name="field" value="{{$field->id}}">
                    <label class="wskLabel" for="anId4{{$index}}">{{$adminFields[$index]->field_name}}</label>
                </div>
              @endforeach
          <p>たねを追加す（複数回答可）: 
              @foreach($plants as $index=>$plant)
                <div class="index-container shadow">
                    <input type="checkbox" id="anId1{{$index}}"name="plant[]" value="{{$plant->id}}">
                    <label class="wskLabel" for="anId1{{$index}}">植物名：{{$plant->name}}　ポイント：{{$plant->point}}</label>
                </div>
              @endforeach
          </p>
          <div class="skyblue panel"><button class="skyblue menu-button shadow" type="submit" value="送信">送信</button></div>
     </form>
  </div>
@endsection