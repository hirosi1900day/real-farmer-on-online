@extends('layouts.app')
@section('head')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" 
    crossorigin="anonymous"></script>
   <script src="{{ secure_asset('/js/turn.js') }}"></script>
@endsection
@section('content')
    
        <div id="flipbook"> 
                <div>page1</div>
                <div>page2</div>
                <div>page3</div>
        </div>
   
    <h1>ありません</h1>
    
    
@endsection
@section('low')
<script type="text/javascript">
    $("#flipbook").turn();
</script>
@endsection