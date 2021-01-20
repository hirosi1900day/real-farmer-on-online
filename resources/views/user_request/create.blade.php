@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>登録ページ</h1>
    {!! Form::open(['route'=>'user_request.store','enctype'=>'multipart/form-data']) !!}
    
    <div class='form-group'>
       {!! Form::label('subject', 'タイトル') !!}
       {!! Form::textarea('subject',old('subject'),['class'=>'form-control']) !!}
    </div>
     <div class='form-group'>
       {!! Form::label('requests', '要望内容') !!}
       {!! Form::textarea('requests',old('requests'),['class'=>'form-control']) !!}
    </div>
       {!! Form::submit('送信する',['class'=>'btn btn-info']) !!}
       {!! Form::close() !!}   
</div>
@endsection