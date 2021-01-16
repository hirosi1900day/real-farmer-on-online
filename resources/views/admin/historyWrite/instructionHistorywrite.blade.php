@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    <h1>登録ページ</h1>
    {!! Form::open(['route'=>'admin.instructionHistoryWrite.create']) !!}
        <div class='form-group'>
            
            {!! Form::hidden('user_id',$user->id,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
           
            {!! Form::hidden('user_instruction_id',$user_instruction->id,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('content', '指示項目履歴入力') !!}
            {!! Form::textarea('content',old('content'),['class'=>'form-control']) !!}
        </div>
    {!! Form::submit('保存する',['class'=>'btn btn-info']) !!}
    {!! Form::close() !!}   
</div>
@endsection