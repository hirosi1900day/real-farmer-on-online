

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
                <li v-bind:class="{active: activeTab === 'tabs-4'}" v-on:click="activeTab = 'tabs-4'">
                   追加された指示
                </li>
                <li v-bind:class="{active: activeTab === 'tabs-5'}" v-on:click="activeTab = 'tabs-5'">
                   追加された種
                </li>
                <li v-bind:class="{active: activeTab === 'tabs-6'}" v-on:click="activeTab = 'tabs-6'">
                   日記を書く
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
                    <div class="index-container shadow">{!! link_to_route('chat.user_index', 'チャットユーザー一覧') !!}</div>
                    <div class="index-container shadow">{!! link_to_route('user_request.index', '要望一覧') !!}</div>
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
                <section v-show="activeTab === 'tabs-4'" class="background-gray-non-border">
                    @if (count($user_instructions) > 0)
                              @foreach($user_instructions as $index=>$user_instruction)
                                <div class="index-container shadow">
                                    
                                    <div>{{$adminFields_For_instruction[$index]->field_name}}</div>
                                    <div>{{$instructions[$index]->name}}</div>
                                    <a href="{{route('admin.user.show',['id'=>$user_instruction->field()->first()->user()->first()->id])}}">
                                        <div>{{$user_instruction->field()->first()->user()->first()->name}}</div>
                                    </a>
                                    <a href="{{route('admin.instructionHistoryWrite',['id'=>$user_instruction->id])}}">
                                        <button class="button">{{$user_instruction->field()->first()->user()->first()->name}}履歴を書き込む</button>
                                    </a>
                                </div>
                                
                              @endforeach
                          @else
                              <h>ありません</h>
                          @endif
                </section>
                <section v-show="activeTab === 'tabs-5'" class="background-gray-non-border">
                    @if (count($plants) > 0)
                        @foreach($plants as $index=>$plant)
                            <div class="index-container shadow">
                                <div>{{$adminField_For_plant[$index]->field_name}}</div>
                                <div>{{$plantType[$index]->name}}</div>
                                <a href="{{route('admin.user.show',['id'=>$plant->field()->first()->user()->first()->id])}}">
                                    <div>{{$plant->field()->first()->user()->first()->name}}</div>
                                </a>
                                <a href="{{route('admin.plantHistoryWrite',['id'=>$plant->id])}}">
                                    <button class="button">{{$plant->field()->first()->user()->first()->name}}履歴を書き込む</button>
                                </a>
                            </div>
                                
                        @endforeach
                    @else
                        <h>ありません</h>
                    @endif
                </section>
                <section v-show="activeTab === 'tabs-6'" class="background-gray-non-border">
                    @if (count($used_fields) > 0)
                              @foreach($used_fields as $index=>$used_field)
                                <div class="index-container shadow">
                                    
                                    @if(count($used_field->dailies()->get())>0)
                                        @if(((int)date('d')-
                                        (int)$used_field->dailies()->orderBy('created_at','desc')->first()->created_at->format('d')+
                                        (int)date('m')-
                                        (int)$used_field->dailies()->orderBy('created_at','desc')->first()->created_at->format('m'))>=7)
                                            <div>日記を更新してください</div>
                                            <div>畑の名前：{{$used_adminFields[$index]->field_name}}</div>
                                            <a href="{{route('admin.user.show',['id'=>$used_field->user()->first()->id])}}">
                                                <div>{{$used_field->user()->first()->name}}</div>
                                            </a>
                                            <a href="{{route('admin.dailyCreate',['id'=>$used_field->id])}}">
                                                <button class="button">{{$used_field->user()->first()->name}}日記を書き込む</button>
                                            </a>
                                        @endif
                                    @else
                                        @if(((int)date('d')-(int)$used_field->created_at->format('d')+(int)date('m')-(int)$used_field->created_at->format('m'))>=0)
                                            <div>初めての日記を更新してください</div>
                                            <div>畑の名前：{{$used_adminFields[$index]->field_name}}</div>
                                            <a href="{{route('admin.user.show',['id'=>$used_field->user()->first()->id])}}">
                                                <div>{{$used_field->user()->first()->name}}</div>
                                            </a>
                                            <a href="{{route('admin.dailyCreate',['id'=>$used_field->id])}}">
                                                <button class="button">{{$used_field->user()->first()->name}}日記を書き込む</button>
                                            </a>
                                        @endif
                                    @endif
                                    
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