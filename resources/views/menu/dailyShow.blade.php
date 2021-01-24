@extends('layouts.app')

@section('content')
    @if(count($dailys))
    <div class="container-center">
        <div>右上をクリックし、次のページに進もう</div>
        <div id="flipbook">
            <div>
                <div class="book-table">農作日記</div>
                <div><img src="{{ secure_asset('/img/681838.jpg') }}" class="daily-main-image"></div>
            </div>
            @foreach($dailys as $index=>$daily)
                <div class="odd">
                    @if($index==0)
                    <div class="daily-title">初めての日記</div>
                    @else
                    <div>{{$index}}週目</div>
                    @endif
                    
                    <img class="daily-index-image center" src="{{Storage::disk('s3')->url($daily->gallary)}}" alt="">
                </div>
                <div class="even">
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