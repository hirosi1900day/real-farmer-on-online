@extends('layouts.app')

@section('content')
    <div><img src="{{Storage::disk('s3')->url($daily->gallary)}}"></div>
    <div>{{$daily->content}}</div>
@endsection