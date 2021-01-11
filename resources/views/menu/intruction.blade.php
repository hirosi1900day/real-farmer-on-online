@extends('layouts.app')

@section('content')
    <div class="background-skyblue">
    <h1>登録ページ</h1>
    <div id="intruction">
    @foreach($fields as $index=>$field)
        <button data-id="$field->id"></button>
    @endforeach
    </div>
<script>
    const button = document.querySelector('button');
    $array=[];
    button.addEventListener('click', event => {
        $array=
    });    
</script>
@endsection