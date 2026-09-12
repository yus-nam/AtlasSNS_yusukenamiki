        <div id="head">
            <div id="">
                <h1><a href="/index"><img src="/images/atlas.png" class="logo"></a></h1>

                <p>{{ Auth::user()->username }}さん</p>

            
            
                <div class="hamburger-menu">    
                    <button class="menu-toggle under">V</button>
                    <ul class="menu-items">
                        <li><a href="../posts/index">ホーム</a></li>
                        <li><a href="../profiles/profile">プロフィール編集</a></li>
                        <li><a href="../auth/login">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
