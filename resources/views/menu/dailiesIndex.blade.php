@extends('layouts.app')

@section('content')
    @if (count($fields) > 0)
        @foreach($fields as $index=>$field)
            @if(count($field->dailies()->get())>0)
                <div class="index-container shadow">
                    <div>{{$adminFields[$index]->field_name}}</div>
                    @foreach($field->dailies()->get() as $daily)
                        <a href="{{route('user.daily.show',['id'=>$daily->id])}}">
                            <div>{{$daily->id}}</div>
                        </a>
                    @endforeach
                </div>
            @endif
            
        @endforeach
    @else
        <h>ありません</h>
    @endif
@endsection