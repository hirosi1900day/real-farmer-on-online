@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('確認メールが送信されました。') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('新しい確認リンクがあなたのメールアドレスに送信されました。') }}
                        </div>
                    @endif
                    {{ __('メールアドレス確認後、本サービスは利用可能となります。メールのリンクをクリックしてください。') }}
                    {{ __('メールが届かない場合は、再度下記のリンクをクリックしてください') }}
                    {{ __('（迷惑メールにメールが送信されている可能性があるので確認してください）') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('こちらをクリックして、再度確認メールを送る') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
