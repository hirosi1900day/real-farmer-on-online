@extends('layouts.app')

@section('content')
    <h>plantを追加</h>
    @if(count($fields)>0)
        @foreach($fields as $field)
            <div>{{$field->adminField_id}}{!! link_to_route('user.plant', '植物を追加する') !!}</div>
        @endforeach
    @endif
    <h>指示をする</h>
    @if(count($fields)>0)
        @foreach($fields as $field)
            <div>{{$field->adminField_id}}{!! link_to_route('user.instruction', '指示を追加する') !!}</div>
        @endforeach
    @endif
    
@endsection