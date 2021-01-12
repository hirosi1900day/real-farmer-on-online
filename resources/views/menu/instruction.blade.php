@extends('layouts.app')

@section('content')
    <div class="background-skyblue">
    <h1>登録ページ</h1>
    <div id="intruction">
    <form action="{{ route('user.menu.instruction') }}" method="POST">
         {{ csrf_field() }}
        <p>好きな色（複数回答可）: 
            @foreach($instructions as $index=>$instruction)
                <input type="checkbox" name="instruction[]" value="{{$instruction->id}}">{{$instruction->name}}
            @endforeach
        </p>
        <p><input type="submit" value="送信"></p>
　　</form>
   
    </div>
 
@endsection