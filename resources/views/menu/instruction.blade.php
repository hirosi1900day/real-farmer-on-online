@extends('layouts.app')

@section('content')
    <div class="background-skyblue">
   
    <h1>指示を追加</h1>
    <div id="intruction">
        <form action="{{ route('user.menu.instruction') }}" method="POST">
         {{ csrf_field() }}
         
            <p>指示を追加する畑（複数回答不可）: 
            　　@foreach($fields as $index=>$field)
                    <input type="radio" name="field" value="{{$field->id}}">{{$adminFields[$index]->field_name}}
                @endforeach
            <p>指示を追加する（複数回答可）: 
                @foreach($instructions as $index=>$instruction)
                    <input type="checkbox" name="instruction[]" value="{{$instruction->id}}">{{$instruction->name}}
                @endforeach
            </p>
            <p><input type="submit" value="送信"></p>
　　    </form>
    </div>
 
@endsection