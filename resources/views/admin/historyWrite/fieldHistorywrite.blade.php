@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>登録ページ</h1>
    {!! Form::open(['route'=>'admin.historyWrite.create']) !!}
        <div class='form-group'>
            {!! Form::label('title', '募集タイトル') !!}
            {!! Form::hidden('user_id',$user->id,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('title', '募集タイトル') !!}
            {!! Form::hidden('field_id',$field->id,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('content', '募集内容') !!}
            {!! Form::textarea('content',old('content'),['class'=>'form-control']) !!}
        </div>
    {!! Form::submit('保存する',['class'=>'btn btn-info']) !!}
    {!! Form::close() !!}   
</div>
@endsection