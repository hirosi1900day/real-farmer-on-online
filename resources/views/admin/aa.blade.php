@extends('layouts.app')

@section('content')
 <h>aa</h>
 <form method="post" action="{{ url('admin/logout') }}">
	@csrf
	<input type="submit" class="btn btn-danger" value="ログアウト" />
</form>
@endsection