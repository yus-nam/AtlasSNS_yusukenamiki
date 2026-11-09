<div id="head">
    {{-- ログイン中のユーザー用アイコン設定 --}}
    @php
        $icons = [
            'icon1.png',
            'icon2.png',
            'icon3.png',
            'icon4.png',
            'icon5.png',
            'icon6.png',
            'icon7.png',
        ];

        $user = Auth::user();

        $randomIcon = $icons[array_rand($icons)];
        
    @endphp


    <div id="header-inner">
        <h1>
            <a href="/index">
                <img src="/images/atlas.png" class="logo" alt="logo">
            </a>
        </h1>

        <div class="nav-user-area">
            <div class="nav-user-block">
                <p class="nav_username">{{ Auth::user()->username }}さん</p>
            </div>


            <div class="hamburger-menu">

                <button class="menu-toggle under">V</button>
                
                <ul class="menu-items">
                    <li><a href="{{ url('/index') }}">ホーム</a></li>
                    <li><a href="../profiles/edit">プロフィール編集</a></li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        </form>
                    </li>
                </ul>
            </div>

                @if ($user && $user->icon_image)
                    <img src="{{ asset('storage/' . $user->icon_image) }}" alt="user-icon" class="user-icon post">
                @else
                    <img src="{{ asset('images/' . $randomIcon) }}" alt="user-icon" class="user-icon post">
                @endif
            </div>

    </div>
</div>
