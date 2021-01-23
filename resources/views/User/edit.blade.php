@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4 card-main">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </aside>
        <div class="col-sm-8 background-skyblue">
                {!! Form::model($user, ['route' => ['user.update','id'=>$user->id],'enctype'=>'multipart/form-data','method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'name:') !!}
                    {!! Form::text('name', old($user->name), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('self_introduce', '自己紹介:') !!}
                    {!! Form::textarea('self_introduce', old('self_introduce'), ['class' => 'form-control']) !!}
                </div>
                 <div class="form-group">
                    {!! Form::label('postal_code', '郵便番号:') !!}
                    {!! Form::text('postal_code', old('postal_code'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', '住所:') !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                </div>
                 <div class="form-group">
                    {!! Form::label('telphone_number', '連絡先:') !!}
                    {!! Form::text('telphone_number', old('telphone_number'), ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
        </div>
    </div>
@endsection