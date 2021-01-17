@extends('layouts.app')

@section('content')
  <div class="background-skyblue">
      <h1>種を追加する</h1>
      <form action="{{ route('user.menu.plant') }}" method="POST">
          {{ csrf_field() }}
          <p>たねを追加す（複数回答可）: 
              @foreach($plants as $index=>$plant)
                  <input type="checkbox" name="plant[]" value="{{$plant->id}}">{{$plant->name}}
              @endforeach
          </p>
          <p><input type="submit" value="送信"></p>
     </form>
  </div>
@endsection