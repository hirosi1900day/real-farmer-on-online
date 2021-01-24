@extends('layouts.app')

@section('content')
   <div class="background-skyblue">
    <h1>登録ページ</h1>
    <a href="{{route('user.field_overall')}}" class="button">
        <span>畑の全体を見る</span>
    </a>
    <form action="{{ route('user.menu.field') }}" method="POST">
         {{ csrf_field() }}
    <p>畑を追加する（複数回答可）: 
   
    @foreach($fields as $index=>$field)
        @if($field->used==true)
            <div class="index-container shadow">
                <input type="checkbox" id="anId3{{$index}}" class="wskCheckbox" name="field[]" value="{{$field->id}}">
                <label class="wskLabel" for="anId3{{$index}}">名前：{{$field->field_name}} 　　ポイント：{{$field->field_number}}</label>
                <div><img class="index-image-menu center" src="{{Storage::disk('s3')->url($field->gallary)}}" alt=""></div>
             </div>
        @endif
    @endforeach
   
    </p>
    <div class="skyblue panel"><button class="skyblue menu-button shadow" type="submit" value="送信">送信</button></div>
    </form>
    
@endsection