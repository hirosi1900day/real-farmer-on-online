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
            @if($user->id==Auth::id())
            <a href="{{route('user.edit',['user'=>$user->id])}}" class="button">
                <i class="fas fa-edit fa-2x"></i>
                <span>情報を編集</span>
            </a>
            @endif
        </div>
     </div>
    <div class="user_show_body">
        <div id="adminUserShow">
            <ul class="tabs-menu">
                <li v-bind:class="{active: activeTab === 'tabs-1'}" v-on:click="activeTab = 'tabs-1'">
                    会員情報
                </li>
                
                <li v-bind:class="{active: activeTab === 'tabs-2'}" v-on:click="activeTab = 'tabs-2'">
                     メニュー
                </li>
                <li v-bind:class="{active: activeTab === 'tabs-3'}" v-on:click="activeTab = 'tabs-3'">
                     畑
                </li>
                <li v-bind:class="{active: activeTab === 'tabs-4'}" v-on:click="activeTab = 'tabs-4'">
                       
                </li>

            </ul>
            <section class="tabs-content">
                <section v-show="activeTab === 'tabs-1'" class="padding">
                    <div class="index-container shadow">
                        会員ネーム：{{$user->name}}
                        会員メール：{{$user->email}}
                        会員保有ポイント：{{$user->point}}
                        会員ネーム：{{$user->name}}
                        会員住所：{{$user->address}}
                        会員郵便番号：{{$user->postal_code}}
                        会員電話番号：{{$user->telphone_number}}
                    </div>
                </section>
                <section v-show="activeTab === 'tabs-2'" class="background-gray-non-border">
                    
                </section>
                <section v-show="activeTab === 'tabs-3'" class="background-gray-non-border">
                  @if(count($fields)>0)
                    @foreach($fields as $index=>$field)
                        <div class="index-container shadow">
                            <div>{{$adminFields[$index]->field_name}}</div>
                        </div>
                    @endforeach
                  @endif
                    
                </section>
                <section v-show="activeTab === 'tabs-4'" class="background-gray-non-border">
                　　　　　
                </section>
            </section>
        </div>
    </div>


</div>
@endsection