@extends('layouts.app')

@section('content')
<div class="background-skyblue"> 
    <h>plantを追加</h>
        <form action="{{ route('user.menu.plant') }}" method="POST">
            {{ csrf_field() }}
            <p>たねを追加す（複数回答可）: 
            @foreach($plants as $index=>$plant)
                <input type="checkbox" name="plant[]" value="{{$plant->id}}">{{$plant->name}}
            @endforeach
            </p>
            <p><input type="submit" value="送信"></p>
        </form>
    <h>指示をする</h>
        <form action="{{ route('user.menu.instruction') }}" method="POST">
            {{ csrf_field() }}
            <p>指示を追加する（複数回答可）: 
                @foreach($instructions as $index=>$instruction)
                    <input type="checkbox" name="instruction[]" value="{{$instruction->id}}">{{$instruction->name}}
                @endforeach
            </p>
            <p><input type="submit" value="送信"></p>
　　    </form>
</div>
@endsection