@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>新着情報を作成する</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'admin.store.information']) !!}
                <div class="form-group">
                    {!! Form::label('content', '新着情報内容') !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('新着情報を作成する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection