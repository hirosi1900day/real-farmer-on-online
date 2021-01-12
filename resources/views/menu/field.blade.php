@extends('layouts.app')

@section('content')
   <div class="background-skyblue">
    <h1>登録ページ</h1>
    <form action="{{ route('user.menu.field') }}" method="POST">
         {{ csrf_field() }}
    <p>好きな色（複数回答可）: 
    @foreach($fields as $index=>$field)
        @if($field->used==true)
        <input type="checkbox" name="field[]" value="{{$field->id}}">{{$field->field_name}}
        @endif
    @endforeach
    </p>
    <p><input type="submit" value="送信"></p>
    </form>
    
@endsection