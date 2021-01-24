@extends('layouts.app')

@section('content')
    <div>
        {!! Form::open(['route'=>'admin.overallField.store','enctype'=>'multipart/form-data']) !!}
        <div class='form-group'>
            {!! Form::label('gallary','畑の写真') !!}
            {!! Form::file('gallary') !!}
        </div>
        {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    
    @if (count($overallFields) > 0)
        @foreach($overallFields as $overallField)
            <div><img class="index-image-menu center" src="{{Storage::disk('s3')->url($overallField->gallary)}}" alt=""></div>
            <form method="post" action="{{route('admin.overallField.delete')}}">
                @csrf
                <input type="hidden" name="overallField_id" value={{$overallField->id}}>
                <input type="submit" class="btn btn-danger" value="削除" />
            </form>
            
        @endforeach
    @else
    <h>ありません</h>
    @endif
    
@endsection