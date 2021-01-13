@extends('layouts.app')

@section('content')

<div class="border background-skyblue">
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}} 
               
            </div>
            @if($user==Auth::user())
            <a href="{{route('user.edit',['user'=>$user->id])}}" class="button">
                <i class="fas fa-edit fa-2x"></i>
                <span>情報を編集</span>
            </a>
            @endif
        </div>
     </div>
    <div class="user_show_body">
        <div id="mypage">
            <ul class="tabs-menu">
                <li v-bind:class="{active: activeTab === 'tabs-1'}" v-on:click="activeTab = 'tabs-1'">
                    自己紹介
                </li>
                @if(Auth::check())
                    <li v-bind:class="{active: activeTab === 'tabs-2'}" v-on:click="activeTab = 'tabs-2'">
                       メニュー
                   </li>
                   <li v-bind:class="{active: activeTab === 'tabs-3'}" v-on:click="activeTab = 'tabs-3'">
                       畑
                   </li>
                   <li v-bind:class="{active: activeTab === 'tabs-4'}" v-on:click="activeTab = 'tabs-4'">
                       
                   </li>
                @endif
            </ul>
            <section class="tabs-content">
                <section v-show="activeTab === 'tabs-1'" class="padding">
                    <p class="textForm">
                        自己紹介：</br>
                        {!! nl2br(e($user->self_introduce)) !!}
                    </p>
                </section>
                <section v-show="activeTab === 'tabs-2'" class="background-gray-non-border">
                    <div>{!! link_to_route('user.pay.index', 'ポイントを追加する') !!}</div>
                    <div>{!! link_to_route('user.instruction', '指示を追加する') !!}</div>
                    <div>{!! link_to_route('user.field', '畑を追加する') !!}</div>
                    <div>{!! link_to_route('user.plant', '植物を追加する') !!}</div>
                    <div>{!! link_to_route('user.myfield', 'マイ畑を見る') !!}</div>
                </section>
                <section v-show="activeTab === 'tabs-3'" class="background-gray-non-border">
                
                </section>
                <section v-show="activeTab === 'tabs-4'" class="background-gray-non-border">
                　　　　　
                </section>
            </section>
        </div>
    </div>


</div>
@endsection