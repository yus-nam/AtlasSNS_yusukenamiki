        <div id="head">
            <div id="">
                <h1><a href="/index"><img src="/images/atlas.png" class="logo"></a></h1>

                <p>{{ Auth::user()->username }}さん</p>
            
                <div class="hamburger-menu">
                    <button class="menu-toggle under">V</button>
                    <ul class="menu-items">
                        <li><a href="../posts/index">ホーム</a></li>
                        <li><a href="../profiles/edit">プロフィール編集</a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </div>
