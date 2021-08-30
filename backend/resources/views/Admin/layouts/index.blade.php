<html>
    <head>
        <meta charset=”UTF-8″>
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>管理画面 - KYOTO_BASE</title>

        @yield('css')
    </head>
    <body>
        <header>
            <div class="fv">
                <p>管理画面</h2>
            </div>
        </header>
        <main>
            <div class="side_bar">
                <ul>
                    <a href="{{ url('/admin/contents') }}">
                        <li>投稿</li>
                    </a>
                    <a href="{{ url('admin/user') }}">
                        <li>ユーザー管理</li>
                    </a>
                    <li>設定</li>
                    <a href="{{ url('/')}}">
                        <li>トップへ</li>
                    </a>
                </ul>
            </div>
            <div class="contents">
                @yield('contents')
            </div>
        </main>
        <footer>

        </footer>
        @yield('js')
    </body>
</html>