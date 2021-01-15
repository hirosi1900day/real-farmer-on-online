

@extends('layouts.app')

@section('content')
<div class="border background-skyblue">
    <div class="user_show_body">
        <div id="adminMain">
            <ul class="tabs-menu">
                <li v-bind:class="{active: activeTab === 'tabs-1'}" v-on:click="activeTab = 'tabs-1'">
                    ユーザー一覧
                </li>
                <li v-bind:class="{active: activeTab === 'tabs-2'}" v-on:click="activeTab = 'tabs-2'">
                   リンク
                </li>
                <li v-bind:class="{active: activeTab === 'tabs-3'}" v-on:click="activeTab = 'tabs-3'">
                   追加された畑
                </li>
            </ul>
            <section class="tabs-content">
                <section v-show="activeTab === 'tabs-1'" class="padding">
                     <div>
                          @if (count($users) > 0)
                              @foreach($users as $index=>$user)
                                <div class="index-container shadow">
                                    <a href="{{route('admin.user.show',['id'=>$user->id])}}">
                                        <div>{{$user->name}}</div>
                                        <div>{{$user->email}}</div>
                                    </a>
                                </div>
                                
                              @endforeach
                          @else
                              <h>ありません</h>
                          @endif
                     </div> 
                </section>
                <section v-show="activeTab === 'tabs-2'" class="background-gray-non-border">
                    <div class="index-container shadow">{!! link_to_route('admin.adminField', 'field') !!}</div>
                    <div class="index-container shadow">{!! link_to_route('admin.plantType', 'plantType') !!}</div>
                    <div class="index-container shadow">{!! link_to_route('admin.instructons', 'instructons') !!}</div>
                </section>
                <section v-show="activeTab === 'tabs-3'" class="background-gray-non-border">
                    @if (count($fields) > 0)
                              @foreach($fields as $index=>$field)
                                <div class="index-container shadow">
                                    <div>{{$adminFields[$index]->field_name}}</div>
                                    <a href="{{route('admin.user.show',['id'=>$field->user()->first()->id])}}">
                                        <div>{{$field->user()->first()->name}}</div>
                                    </a>
                                    <a href="{{route('admin.fieldHistoryWrite',['id'=>$field->id])}}">
                                        <button class="button">{{$field->user()->first()->name}}履歴を書き込む</button>
                                    </a>
                                </div>
                                
                              @endforeach
                          @else
                              <h>ありません</h>
                          @endif
                </section>
            </section>
        </div>
    </div>


</div>

@endsection