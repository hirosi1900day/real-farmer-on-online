@extends('layouts.app')

@section('content')
    @if(count($dailys))
        <div id="flipbook"> 
            <div>目次</div>
            @foreach($dailys as $daily)
            <div>
                <img class="user-profile-image center" src="{{Storage::disk('s3')->url($daily->gallary)}}" alt="">
            </div>
            <div>{{$daily->content}}</div>
            @endforeach
        </div>
    @else
    <h1>ありません</h1>
    @endif
    
@endsection
@section('low')
<script src="{{ secure_asset('/js/turn.js') }}"></script>
<script type="text/javascript">
    $("#flipbook").turn();
</script>
@endsection