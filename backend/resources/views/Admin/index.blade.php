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
                                <td class='js_title'>{{ $content->getDetailTitle() }}</td>
                                <td>-</td>
                                <td class='js_category_name'>{{ $content->getDetailCategoryName() }}</td>
                                <td class='js_detail_description'>{{ $content->getDetailDescription() }}</td>
                                <td class='js_release_datetime'>{{ $content->release_datetime }}</td>
                                <td>{{ $content->created_at }}</td>
                                <td>{{ $content->updated_at }}</td>
                                <td>
                                    <button class="edit_btn" value="{{ $content->id }}">編集</button>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <div id="new_button" class="new_button">
                    <a>新規投稿</a>
                </div>
                <div id="new_modal" class="new_modal_background">
                    <div class="new_modal-content">
                        <div class="new_modal-body">
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
                <div id="edit_modal" class="edit_modal_background">
                    <div class="edit_modal-content">
                        <div class="edit_modal-body">
                            <h1 class="edit_form_title">編集</h1>

                            @inject ( 'dateTimeHelper', 'App\Models\Helper\DateTimeHelper' )

                            {!! Form::open(['url' => 'admin/new', 'method' => 'post']) !!}
                            {!! Form::label('title', '記事タイトル') !!} <br>
                            {!! Form::text('title', null, ['id' => 'article_title', 'class' => 'title']) !!} <br>
                            {!! Form::label('description', '説明') !!} <br>
                            {!! Form::textarea('description', null, ['id' => 'article_description', 'placeholder' => '入力してください', 'rows' => '5', 'class' => 'description']) !!} <br>
                            {!! Form::label('release_datetime', '公開日時') !!} <br>
                            {!! Form::date('release_datetime', null, ['id' => 'release_date_time', 'class' => 'release_datetime']) !!} <br>
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
            var edit_btns = document.getElementsByClassName('edit_btn');

            for (let i = 0; i < edit_btns.length; i++) {
                edit_btns[i].addEventListener('click', function() {
                    let contents = @json($contents);
                    let target_content = contents[i];

                    let contents_param = new Map();
                    contents_param.set('title', target_content.title);
                    contents_param.set('description', target_content.description);
                    contents_param.set('release_datetime', target_content.release_datetime);
                    contents_param.set('category_id', target_content.category_id);
                    contents_param.set('img_path', target_content.img_path);
                    createEditFormByContentsParam(contents_param);
                })
            }
        </script>
    </body>
</html>