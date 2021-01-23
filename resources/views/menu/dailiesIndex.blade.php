@extends('layouts.app')

@section('content')
    @if(count($dailys))
    <div class="container-center">
         
     
        <div id="flipbook"> 
            <div>目次</div>
            @foreach($dailys as $daily)
            <div>
                <img class="user-profile-image center" src="{{Storage::disk('s3')->url($daily->gallary)}}" alt="">
            </div>
           <div class="daily-content">
               <div class="lines">{{$daily->content}}</div>
           </div>
            
            
            @endforeach
        </div>
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