@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>登録ページ</h1>
    {!! Form::open(['route'=>'admin.dailyStore','enctype'=>'multipart/form-data']) !!}
    <div class='form-group'>
        {!! Form::hidden('field_id',$field->id,['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('gallary','写真') !!}
        {!! Form::file('gallary') !!}
    </div>
    <div class='form-group'>
       {!! Form::label('content', '日記の内容') !!}
       {!! Form::textarea('content',old('content'),['class'=>'form-control']) !!}
    </div>
       {!! Form::submit('保存する',['class'=>'btn btn-info']) !!}
       {!! Form::close() !!}   
</div>
@endsection