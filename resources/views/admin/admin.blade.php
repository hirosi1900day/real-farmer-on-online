@extends('layouts.app')

@section('content')
 <h>管理画面</h>
 {!! link_to_route('admin.aa', 'aa') !!}
 {!! link_to_route('admin.adminField', 'field') !!}
 {!! link_to_route('admin.plantType', 'plantType') !!}
 {!! link_to_route('admin.instructons', 'instructons') !!}
@endsection