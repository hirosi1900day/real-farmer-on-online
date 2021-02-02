<header>
    
    <!-- ナビゲーションバー -->
    <nav class="navbar fixed-top navbar-expand-xl navbar-light bg-color">
      <div class="container-fluid">

        <!-- ホームリンク -->
        <a href="/" class="navbar-brand" aria-label="ホーム">
           <img class="logo center" src="{{ secure_asset('/img/logo.jpg') }}" alt="">
        </a>

        <!-- 画面幅が狭い時に表示されるハンバーガーメニュー -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
          aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- メニュー -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              @if(Auth::check())
              @if(Auth::user()->email==config('const.admin_user')[0])
                 <a class="nav-link" href="/admin/home">Top</a>
              @else
                 <a class="nav-link" href="/user/mypage">Top</a>
              @endif
              @endif
            </li>
            @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.mypage')}}">MyProfile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('logout.get')}}">Logout</a>
            </li>
            <li class="navbar-information">
                    <div class="navbar-user-name">名前：{{\Auth::user()->name}}</div>
                    <div class="navbar-user-point">保有ポイント数：{{\Auth::user()->point}}</div>
            </li>
            @else
             <li class="nav-item">
                <a class="nav-link" href="{{route('signup.get')}}">会員登録</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">ログイン</a>
            </li>
            @endif
            
            
           </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!--/.container-fluid -->
    </nav>

</header>







