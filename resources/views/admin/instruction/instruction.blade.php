@extends('layouts.app')

@section('content')
    <div>
        {!! Form::open(['route'=>'admin.instructons.post']) !!}
        <div class='form-group'>
            {!! Form::label('name', '指示') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('point', 'ポイント') !!}
            {!! Form::text('point', old('point'), ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    @if (count($instructions) > 0)
        @foreach($instructions as $instruction)
            <div>{{$instruction->name}}</div>
            <div>{{$instruction->point}}</div>
        @endforeach
    @else
    <h>ありません</h>
    @endif
    
@endsection