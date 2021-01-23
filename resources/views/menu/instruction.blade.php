@extends('layouts.app')

@section('content')
    <div class="background-skyblue">
   
    <h1>指示を追加</h1>
    <div id="intruction">
        <form action="{{ route('user.menu.instruction') }}" method="POST">
         {{ csrf_field() }}
            <p>指示を追加する畑（複数回答不可）: 
            　　@foreach($fields as $index=>$field)
                    <div class="index-container shadow">
                        <input type="radio" id="anId5" class="wskCheckbox" name="field" value="{{$field->id}}">
                        <label class="wskLabel" for="anId5">{{$adminFields[$index]->field_name}}</label>
                    </div>
                @endforeach
            <p>指示を追加する（複数回答可）: 
                @foreach($instructions as $index=>$instruction)
                    <div class="index-container shadow">
                        <input type="checkbox" id="anId2" class="wskCheckbox" name="instruction[]" value="{{$instruction->id}}">
                        <label class="wskLabel" for="anId2">{{$instruction->name}}</label>
                    </div>
                @endforeach
            </p>
            <div class="skyblue panel"><button class="skyblue menu-button shadow" type="submit" value="送信">送信</button></div>
　　    </form>
    </div>
 
@endsection