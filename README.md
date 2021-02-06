
・リポジトリ（Webアプリ）の名前：Name</br>
&nbsp;&emsp;realFarmer</br>
&nbsp;&emsp;&emsp;オンラインでリアル感覚で農業の体験ができたら、という思いを込めて決めた</br>
・概要：Overview</br>
&nbsp;&emsp;本サービスは、ネット上で野菜を育てながら農業について学んでいくサービスです。</br>
&nbsp;&emsp;主な機能</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;・畑の選択</br>
&emsp;&emsp;・育てる野菜の選択</br>
&emsp;&emsp;・育った野菜を発送</br>
&emsp;&emsp;・野菜の成長度合いをお知らせする日記機能</br>
&emsp;&emsp;・決済機能</br>
&emsp;&emsp;・メール認証会員登録機能</br>
&emsp;&emsp;・チャット機能</br>
&emsp;&emsp;・管理画面</br>
・使用言語：language</br>
&emsp;・laravel(php):約90%</br>
&emsp;・vue.js(javascript):約10% (主に非同期処理で使用）</br>
・使用外部サービス</br>
&emsp;・aws:S3,SES（日記、畑の写真などにS3を使用、メール認証会員登録にSESを使用）</br>
&emsp;・stripe（種購入などの決済時に使用、導入の容易さ、サービスの信頼性より選択した）</br>
&emsp;・heroku(ユーザー訪問数、サービス内の機能上のサーバーへの負荷はそこまで大きくないと判断し、コスト面を考えawsではなくherokuをサーバーとして</br>
&emsp;選択した）</br>
・今後の改良点</br>
&emsp;当初本サービスは、任天堂動物の森のような、ゲームのなかでキャラクターが育てた作物等がリアルとリンクし、</br>
&emsp;ゲームの中での収穫時に実際に家に野菜が届くというゲーム✖️リアルというコンセプトで作成に当たった。</br>
&emsp;しかし実装を進めていく中で、技術面の未熟さをしり断念した。</br>
&emsp;今後、技術を高めていき、この目標に近づけるよう更新を続けていく。</br>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# real-farmer-on-online
