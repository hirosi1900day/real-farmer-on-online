@extends('layouts.app')

@section('content')
    @if (count($error) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($error as $e)
            <li class="ml-4">{{ $e }}</li>
        @endforeach
    </ul>
@endif
@endsection