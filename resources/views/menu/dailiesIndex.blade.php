@extends('layouts.app')

@section('content')
<div class="container-welcome">
    @foreach($fields as $index=>$field)
        <div class="index-container shadow margin center">
            <a href="{{route('user.daily.show',['id'=>$field->id])}}">
                <div>
                    {{$adminFields[$index]->field_name}}
                </div>
            </a>
        </div>
@endforeach
</div>

@endsection