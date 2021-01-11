@extends('layouts.app')

@section('content')
    <div>
        {!! Form::open(['route'=>'admin.adminField.post']) !!}
        <div class='form-group'>
            {!! Form::label('field_name', '畑の名前') !!}
            {!! Form::text('field_name', old('field_name'), ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('field_number', '畑の番号') !!}
            {!! Form::text('field_number', old('field_number'), ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    
    @if (count($adminFields) > 0)
        @foreach($adminFields as $adminField)
            <div>{{$adminField->field_number}}</div>
            <div>{{$adminField->field_name}}</div>
        @endforeach
    @else
    <h>ありません</h>
    @endif
    
@endsection