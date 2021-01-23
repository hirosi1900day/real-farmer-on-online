@extends('layouts.app')

@section('content')
   <div class="background-skyblue">
    <h1>登録ページ</h1>
    <form action="{{ route('user.menu.field') }}" method="POST">
         {{ csrf_field() }}
    <p>好きな色（複数回答可）: 
    @foreach($fields as $index=>$field)
        @if($field->used==true)
            <div class="index-container shadow">
                <input type="checkbox" id="anId3" class="wskCheckbox" name="field[]" value="{{$field->id}}">
                <label class="wskLabel" for="anId3">{{$field->field_name}}</label>
             </div>
        @endif
    @endforeach
    </p>
    <div class="skyblue panel"><button class="skyblue menu-button shadow" type="submit" value="送信">送信</button></div>
    </form>
    
@endsection