@extends('layouts.app')

@section('content')
<div class="background-skyblue">
    @if (count($overallFields) > 0)
        <div class="image-gallery animated">
            <div class="d-inline-block">
                @foreach ($overallFields as $index=>$overallField)
                    <div class="image-gallery__item">
                        <img class="gallery-photo" src="{{Storage::disk('s3')->url($overallField->gallary)}}" >
                    </div>    
                @endforeach 
            </div>
        </div>
    @else
        <div>写真がありません</div>
    @endif
</div>
@endsection