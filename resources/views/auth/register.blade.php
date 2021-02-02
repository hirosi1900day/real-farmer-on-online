@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Sign up</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('self_introduce', 'self_introduce') !!}
                    {!! Form::textarea('self_introduce', old('self_introduce'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('address', 'address') !!}
                    {!! Form::text('address', old('address'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('postal_code', 'postal_code') !!}
                    {!! Form::text('postal_code', old('postal_code'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('telphone_number', 'tel') !!}
                    {!! Form::text('telphone_number',old('telphone_number'),['class' => 'form-control']) !!}
                </div>
                <a class="list-fontsize" href="{{route('agree')}}">利用規約</a>
                {!! Form::submit('利用規約に同意した上で登録を行う', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection