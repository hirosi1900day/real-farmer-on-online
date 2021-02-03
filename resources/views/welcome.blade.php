@extends('layouts.app')


@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
<link rel="stylesheet" href="{{ secure_asset('css/welcome.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.css" integrity="sha512-K2J6Yt6ElUYEMPcTr0wm555AAyiqkgYiUgPIW18FT88/aYSNDk0EvGjsln/TEu3ee/jaHf0xoXzFppSbBtUXbQ==" crossorigin="anonymous" />
@endsection
@section('content')



  <section>
      <section class="swiper width-height">
          <div class="swiper-container">
              <div class="swiper-wrapper">
                  <div class="swiper-slide slide01">
                      <div class="slide-contents">
                          <div class="slide-contents-title">
                              農業に挑戦したいあなたをサポート<br>
                          </div>
                          <div class="slide-contents-text">
                          リモートで野菜を育てて、農作のノウハウを身につけよう！<br>
                          田舎暮らしをしてみたい方にもおすすめです！<br>
                          </div>
                      </div> <!-- slide-contents -->
                  </div> <!-- swiper-slide -->
                  <div class="swiper-slide slide02">
                      <div class="slide-contents">
                          <div class="slide-contents-title">
                          一緒に野菜を育てる仲間とコミュニケーションをとり、楽しく学ぼう<br>
                          </div>
                          <div class="slide-contents-text">
                          コミュニティーチャット機能で野菜を育てる仲間とコミュニケーションを<br>
                          取ることで、飽きずに楽しく野菜を育てることができます。<br>
                          </div>
                      </div> <!-- slide-contents -->
                  </div> <!-- swiper-slide -->
              </div> <!-- swiper-wrapper -->
              <div class="swiper-button">
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
              </div> <!-- swiper-button -->
              <div class="swiper-pagination"></div>
          </div> <!-- swiper-container -->
      </section> <!-- swiper -->
  </section>
   
  <section class="section-background-skyblue width-height animated">
      <div class="welcome-padding">
          <div class="text-title margin-auto center">あなたの人生を豊かにする学びを</div>
          <div class="flex-section2 center">
              <div class="margin-auto center">
                  <div class="cercle margin-center"><i class="fas fa-users fa-2x"></i></div>
                  <div class="text center">content</div>
                  
              </div>
              <div class="margin-auto center">
                  <div class="cercle margin-center"><i class="fas fa-user-graduate fa-2x"></i></div>
                  <div class="text center">content</div>
                 
              </div>
              <div class="margin-auto center">
                  <div class="cercle margin-center"><i class="fas fa-tractor fa-2x"></i></div>
                  <div class="text center">content</div>
                  
              </div>
          </div>
      </div>
  </section>
  <section class="section-background-white width-height animated">
      <div class="flex">
          <div class="margin-auto welcome-padding">
              <div class="text-title center">コミュニティー機能</div>
              <div class="center text-welcome">コミュニティーチャットでメンバーになっている</br>ユーザーと
              農業について学ぶことができ、今後農業をしたい人、家庭菜園で野菜を育てたいけど上手に育てられない、そして</br>
              老後田舎暮らしをしたい、人におすすめです。</div>
          </div>
          <div>
              <img class="index-image-welcome margin-left image-padding-left" src="/img/chat.jpg">
          </div>
      </div>
  </section>
  <section class="section-background-skyblue width-height animated">
      <div class="flex">
          <div>
              <img class="index-image-welcome margin-right image-padding-right" src="/img/onlinesalone.jpg">
          </div>
          <div class="margin-auto welcome-padding">
              <div class="text-title center">オンラインサロン機能</div>
              <div class="center text-welcome">常時管理ユーザーとメッセージを取れるようになっており、</br>
              農作についてわからない部分を質問できるよになってます。</br>
              ※ただし、すぐに返信できるとは限りません</div>
          </div>
      </div>
  </section>
  <section class="section-background-white width-height animated">
      <div>
          <div class="flex">
          <div class="margin-auto welcome-padding">
              <div class="text-title center">リモート農園機能</div>
              <div class="text-welcome center">畑を家に持っていいない方もリモートで</br>無農薬
              の植物を育てることがでます。また育ててみたい野菜をリクエストすることもできます。</br>
              ※ただし、リクエストには100％対応できるわけではありません。また野菜は天候や条件によって</br>
              育ち方が変化するため、必ず野菜が育つとは限りません</div>
          </div>
          <div>
              <img class="index-image-welcome margin-left image-padding-left" src="/img/remoteFarm.jpg">
          </div>
          </div>
      </div>
  </section>
  <section class="section-background-skyblue width-height animated">
      <div class="welcome-padding">
          <div class="text-title">本サービスの特徴</div>
          <div class="flex-section6">
              <div class="margin-auto padding-welcome">
                  <div class="text-title">費用について</div>
                  <div class="text-welcome">費用は月会費ではなく、
                  レンタルする畑に対して費用がかります。</br>
                  一つの畑には２つの野菜を育てることができ、</br>
                  その野菜を自宅に発送する、または天候などで収穫不可</br>
                  となるまで、畑はレンタルすることができます。</br>
                  </div>
              </div>
              <div class="margin-auto padding-welcome">
                  <div class="text-title">植えてみたい種をリクエスすることができます</div>
                  <div class="text-welcome">リクエスト機能をつけているので自分がチャレンジしてみたい</br>
                  野菜も植えてみることができます。また時期によっては、お米やしいたけなどなかな</br>
                  育てることができない、野菜も育てることができます。</div>
              </div>
          </div> 
      </div>
  </section>
  
  <section class="animated">
      <div class="footer width-height">
          <div class="color-white">お仕事のご依頼、お問合せ先</div> 
          <div class="color-white">sugashi1900day@gmail.com</div>
          <div class="color-white bottom">&copyFARMRE</div>
      </div>
  </section>
    
@endsection
@section('low')
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>

<script type="text/javascript">
      var swiper = new Swiper('.swiper-container',{
      speed: 1000, // スピード設定 1000=1秒
      autoplay: true, // 自動切り替え trueで有効 falseで無
      loop: true, // ループ trueで有効 falseで無効
      navigation: {
        nextEl: '.swiper-button-next', // 次のボタンを表示する要素指定
        prevEl: '.swiper-button-prev' // 前のボタンを表示する要素指定
      },
      pagination: {
        el: '.swiper-pagination', // ページネーションを表示する要素指定
      }
    });
    
    //waypoints
    $('.animated').waypoint({
     handler(direction) {
     console.log("test");
    // 要素が画面中央に来るとここが実行される
    if (direction === 'down') {
      /**
       * 下方向のスクロール
       * イベント発生元の要素にfadeInUpクラスを付けることで
       * アニメーションを開始
       */
      $(this.element).addClass('fadeInUp');

      /**
       * waypointを削除することで、この要素に対しては
       * これ以降handlerが呼ばれなくなる
       */
      this.destroy();
    }
  },

  // 要素が画面中央に来たらhandlerを実行
  offset: '80%',
});
</script>      
@endsection