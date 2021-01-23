@extends('layouts.app')


@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
@endsection
@section('content')
  <section>
     <section class="swiper">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide01">
            <div class="slide-contents">
              <div class="slide-contents-title">
                あなたの店舗をシェアしよう<br>
              </div>
              <div class="slide-contents-text">
                店舗の空き時間をシェアしよう<br>
                店舗稼働率をあげて売り上げを向上させよう<br>
              </div>
            </div> <!-- slide-contents -->
          </div> <!-- swiper-slide -->
          <div class="swiper-slide slide02">
            <div class="slide-contents">
              <div class="slide-contents-title">
                店舗もサブスクの時代<br>
              </div>
              <div class="slide-contents-text">
                お気に入りの店舗を見つけてシェアしよう<br>
                店舗を共同で経営し、経済の荒波を打ち破ろう！！<br>
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
  <section></section>
  <section></section>
  <section></section>
  <section></section>
    @include('loading')
    
@endsection
@section('low')
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
</script>      
@endsection