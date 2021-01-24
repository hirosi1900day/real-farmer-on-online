@extends('layouts.app')

@section('content')
    <div>
        {!! Form::open(['route'=>'admin.plamtType.post']) !!}
        <div class='form-group'>
            {!! Form::label('name', '植物の名前') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('point', 'ポイント') !!}
            {!! Form::text('point', old('point'), ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    
    @if (count($plantTypes) > 0)
        @foreach($plantTypes as $plantType)
            <div>{{$plantType->name}}</div>
            <div>{{$plantType->point}}</div>
            <form method="post" action="{{route('admin.plantType.delete')}}">
                @csrf
                <input type="hidden" name="plantType_id" value={{$plantType->id}}>
                <input type="submit" class="btn btn-danger" value="削除" />
            </form>
        @endforeach
    @else
    <h>ありません</h>
    @endif
    
@endsection