@section('navi')
    <div class="nav-menu js-toggle-sp-menu-target">
        <ul class="nav-menu_list js-toggle-sp-menu-target">
                <li class="nav-menu_item"><a href="{{ route('index') }}" class="nav-menu_link"><span>TOP</span></a></li>
            <li class="nav-menu_item"><a href="news_list.html" class="nav-menu_link"><span>お知らせ</span></a></li>
            @if(Auth::check())
            <li class="nav-menu_item"><a href="{{ route('tradeRegister') }}" class="nav-menu_link"><span>出品したい</span></a></li>
            @else
                <li class="nav-menu_item"><a href="{{ route('showLogin') }}" class="nav-menu_link"><span>出品したい</span></a></li>
            @endif
            @if(Auth::check())
                <li class="nav-menu_item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-menu_link2"><span>ログアウト</span></button>
                    </form>
{{--                    <a href="{{ route('logout') }}">ログアウト</a>--}}
                </li>
            @else
                <li class="nav-menu_item"><a href="{{ route('showLogin') }}" class="nav-menu_link"><span>ログイン</span></a></li>
            @endif
            @if(Auth::check())
                <li class="nav-menu_item"><span class="user_display">ログイン中</span></li>
            @else
                <li class="nav-menu_item"><a href="{{ route('showRegister') }}" class="nav-menu_link"><span>新規登録</span></a></li>
            @endif
        </ul>
    </div>
@endsection
