@extends('layouts.app')

@section('content')
    <div>
        {!! Form::open(['route'=>'admin.plamtType.post']) !!}
        <div class='form-group'>
            {!! Form::label('name', '植物の名前') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('point', 'ポイント') !!}
            {!! Form::text('point', old('point'), ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    
    @if (count($plantTypes) > 0)
        @foreach($plantTypes as $plantType)
            <div>{{$plantType->name}}</div>
            <div>{{$plantType->point}}</div>
        @endforeach
    @else
    <h>ありません</h>
    @endif
    
@endsection