@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Sign up</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス(認証がありますので、正しいメールアドレスを入力してください）') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('self_introduce', '自己紹介') !!}
                    {!! Form::textarea('self_introduce', old('self_introduce'),['class' => 'form-control']) !!}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('postal_code', '郵便番号') !!}
                    {!! Form::text('postal_code', old('postal_code'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('address', '住所') !!}
                    {!! Form::text('address', old('address'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('telphone_number', '連絡先') !!}
                    {!! Form::text('telphone_number',old('telphone_number'),['class' => 'form-control']) !!}
                </div>
                <a class="list-fontsize" href="{{route('agree')}}">利用規約</a>
                <div class="text">本サービスはメール認証完了後、使用可能となります。</br>
                下記のボタンを押し、メールを送信してください</div>
                {!! Form::submit('利用規約に同意した上でメールを送信する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection