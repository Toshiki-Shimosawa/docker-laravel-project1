<html>
    <head>
        <meta charset=”UTF-8″>
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>管理画面 - FUKUSHIMA_BASE</title>
        <link href="{{ asset('css/block/navbar.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/admin/top.css') }}" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="fv">
                <h2>管理画面 - オオサカ フクシマベース</h2>
            </div>
        </header>
        <main>
            <div class="side_bar">
                <ul>
                    <li>投稿</li>
                    <li>ユーザー管理</li>
                    <li>設定</li>
                    <li>トップへ</li>
                </ul>
            </div>
            <div class="contents">
                <div id="new_button" class="new_button">
                    <a>新規投稿</a>
                </div>
            </div>
            <div id="modal" class="modal_background">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1 class="new_form_title">新規投稿</h1>

                        {!! Form::open(['url' => 'admin/new', 'method' => 'post']) !!}
                        {!! Form::label('title', '記事タイトル') !!} <br>
                        {!! Form::text('title', null, ['id' => 'article_title']) !!} <br>
                        {!! Form::label('description', '説明') !!} <br>
                        {!! Form::textarea('description', null, ['id' => 'article_description', 'placeholder' => '入力してください', 'rows' => '5']) !!} <br>
                        {!! Form::button('登録', ['id' => 'submit_btn', 'type' => 'button']) !!}
                    </div>
                </div>
            </div>
        </main>
        <footer>

        </footer>
        <script src="{{ asset('/js/app.js') }}"></script>
        <script>

        </script>
    </body>
</html>