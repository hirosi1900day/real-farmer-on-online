@extends('layouts.app')

@section('content')

<div class="background-skyblue">
    <div class="user_show_body">
        <div id="mypage">
            @if($notification==false)
                <a href="{{route('chat.create_chatroom')}}">
                    <ul class="alert alert-danger" role="alert">
                        <li class="ml-4">新着メッセージがあります。</li>
                    </ul>
                </a>
            @endif
            <ul class="tabs-menu">
                @if($user->id==Auth::id())
               　     <li class="text" v-bind:class="{active: activeTab === 'tabs-1'}" v-on:click="activeTab = 'tabs-1'">
                        メニュー
                    </li>
                @endif
            　　<li class="text" v-bind:class="{active: activeTab === 'tabs-2'}" v-on:click="activeTab = 'tabs-2'">
                    自己紹介
                </li>
            </ul>
            <section class="tabs-content">
                <section v-show="activeTab === 'tabs-1'" class="background-gray-non-border">
                    <div class="container-welcome">
                        @foreach($mypage_informations as $index=>$information)
                            <div class="index-container shadow margin center">
                                <a href="{{route($information[0])}}">
                                    <div>
                                        <div class="center"><img class="index-image shadow" src="{{ secure_asset(config('const.mypage_image')[$index])}}"></div>
                                        <div class="text">{{$information[1]}}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
                <section v-show="activeTab === 'tabs-2'" class="padding">
                    @if($user->id==Auth::id())
                        <a href="{{route('user.edit',['user'=>$user->id])}}" class="button">
                           
                            <span>情報を編集</span>
                        </a>
                    @endif
                    
                    <p class="textForm">
                        自己紹介：</br>
                        {!! nl2br(e($user->self_introduce)) !!}
                    </p>
                </section>
            </section>
        </div>
    </div>


</div>
@endsection