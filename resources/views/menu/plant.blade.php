@extends('layouts.app')

@section('content')
  <div class="background-skyblue">
      <h1>種を追加する</h1>
      <form action="{{ route('user.menu.plant') }}" method="POST">
          {{ csrf_field() }}
          <p>指示を追加する畑（複数回答不可）: 
            　@foreach($fields as $index=>$field)
                <div class="index-container shadow">
                    <input type="radio" id="anId4" class="wskCheckbox" name="field" value="{{$field->id}}">
                    <label class="wskLabel" for="anId4">{{$adminFields[$index]->field_name}}</label>
                </div>
              @endforeach
          <p>たねを追加す（複数回答可）: 
              @foreach($plants as $index=>$plant)
                <div class="index-container shadow">
                    <input type="checkbox" id="anId1" class="wskCheckbox" name="plant[]" value="{{$plant->id}}">
                    <label class="wskLabel" for="anId1">{{$plant->name}}</label>
                </div>
              @endforeach
          </p>
          <div class="skyblue panel"><button class="skyblue menu-button shadow" type="submit" value="送信">送信</button></div>
     </form>
  </div>
@endsection