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
                <div>
                    <table class="contents_table">
                        <tr>
                            <th>No</th>
                            <th>イメージ</th>
                            <th>タイトル</th>
                            <th>投稿者</th>
                            <th>カテゴリ</th>
                            <th>説明文</th>
                            <th>表示日</th>
                            <th>作成日</th>
                            <th>更新日</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($contents as $content)
                            <tr>
                                <td>{{ $content->id }}</td>
                                <td>-</td>
                                <td>{{ $content->getDetailTitle() }}</td>
                                <td>-</td>
                                <td>{{ $content->getDetailCategoryName() }}</td>
                                <td>{{ $content->getDetailDescription() }}</td>
                                <td>{{ $content->release_datetime }}</td>
                                <td>{{ $content->created_at }}</td>
                                <td>{{ $content->updated_at }}</td>
                                <td>
                                    <a href="" class="edit_btn">編集</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <div id="new_button" class="new_button">
                    <a>新規投稿</a>
                </div>
                <div id="modal" class="modal_background">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h1 class="new_form_title">新規投稿</h1>

                            @inject ( 'dateTimeHelper', 'App\Models\Helper\DateTimeHelper' )

                            {!! Form::open(['url' => 'admin/new', 'method' => 'post']) !!}
                            {!! Form::label('title', '記事タイトル') !!} <br>
                            {!! Form::text('title', null, ['id' => 'article_title', 'class' => 'title']) !!} <br>
                            {!! Form::label('description', '説明') !!} <br>
                            {!! Form::textarea('description', null, ['id' => 'article_description', 'placeholder' => '入力してください', 'rows' => '5', 'class' => 'description']) !!} <br>
                            {!! Form::label('release_datetime', '公開日時') !!} <br>
                            {!! Form::date('release_datetime', $dateTimeHelper::dateParameter(\Carbon\Carbon::now()), ['id' => 'release_date_time', 'class' => 'release_datetime']) !!} <br>
                            {!! Form::label('category_id', 'カテゴリ') !!} <br>
                            {!! Form::select('category_id', [1=>'グルメ', 2=>'お店',3=>'イベント',4=>'フォト'], 1, ['id' => 'category_id', 'class' => 'category_id']) !!} <br>
                            {!! Form::label('img_path', '画像URL') !!} <br>
                            {!! Form::text('img_path', null, ['id' => 'img_path']) !!} <br>
                            {!! Form::button('登録', ['id' => 'submit_btn', 'type' => 'button', 'class' => 'img_path']) !!}
                        </div>
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