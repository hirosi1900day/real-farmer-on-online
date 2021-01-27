<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Microposts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content"{{csrf_token()}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ secure_asset('css/app2.css') }}">
        @yield('head')
         
    </head>
    <body>
        
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')
        
        
        </br>
        </br>
        </br>
        
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
       
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
        <script src="{{ secure_asset('/js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="{{ secure_asset('/js/loading.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script> 
        @yield('low')
    </body>
    
</html>