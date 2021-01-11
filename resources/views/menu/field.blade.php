@extends('layouts.app')

@section('content')
   <div class="background-skyblue">
    <h1>登録ページ</h1>
    <form action="cgi-bin/abc.cgi" method="post">
        <p>
            @foreach($fields as $index=>$field)
            <input type="checkbox" name="field" value="1" checked="checked">面白い
            
         </p>
         <p>
             <input type="submit" value="送信する">
         </p>
    </form>
@endsection