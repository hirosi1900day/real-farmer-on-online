@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>登録ページ</h1>
    {!! Form::open(['route'=>'admin.return_point_store','enctype'=>'multipart/form-data']) !!}
    <div class='form-group'>
        {!! Form::hidden('user_id',$user->id,['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('point', '返還ポイント数') !!}
        {!! Form::text('point',old('point'),['class'=>'form-control']) !!}
    </div>
       {!! Form::submit('ポイントを返還する',['class'=>'btn btn-info']) !!}
       {!! Form::close() !!}   
</div>

@endsection