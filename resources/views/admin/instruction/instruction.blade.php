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
            <form method="post" action="{{route('admin.instruction.delete')}}">
                @csrf
                <input type="hidden" name="instruction_id" value={{$instruction->id}}>
                <input type="submit" class="btn btn-danger" value="削除" />
            </form>

        @endforeach
    @else
    <h>ありません</h>
    @endif
    
@endsection