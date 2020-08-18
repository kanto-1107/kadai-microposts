@extends('layouts.app')

@section('content')
  
    
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ投稿情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- お気に入り一覧 --}}
            @include('microposts.microposts')
        </div>
    </div>
@endsection