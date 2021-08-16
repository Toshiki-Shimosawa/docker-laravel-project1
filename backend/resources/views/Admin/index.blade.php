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
                        @foreach ($contents as $key => $content)
                            <tr>
                                <td>{{ $content->id }}</td>
                                <td>-</td>
                                <td id='js_title_{{ $key }}'>{{ $content->getDetailTitle() }}</td>
                                <td>-</td>
                                <td id='js_category_name_{{ $key }}' data-category_id="{{ $content->getDetailCategoryid() }}">{{ $content->getDetailCategoryName() }}</td>
                                <td id='js_description_{{ $key }}'>{{ $content->getDetailDescription() }}</td>
                                <td id='js_release_datetime_{{ $key }}'>{{ $content->release_datetime }}</td>
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
                            {!! Form::text('title', null, ['id' => 'edit_title', 'class' => 'edit_title']) !!} <br>
                            {!! Form::label('description', '説明') !!} <br>
                            {!! Form::textarea('description', null, ['id' => 'edit_description', 'placeholder' => '入力してください', 'rows' => '5', 'class' => 'edit_description']) !!} <br>
                            {!! Form::label('release_datetime', '公開日時') !!} <br>
                            {!! Form::date('release_datetime', null, ['id' => 'edit_release_datetime', 'class' => 'edit_release_datetime']) !!} <br>
                            {!! Form::label('category_id', 'カテゴリ') !!} <br>
                            {!! Form::select('category_id', [1=>'グルメ', 2=>'お店',3=>'イベント',4=>'フォト'], 1, ['id' => 'edit_category_id', 'class' => 'edit_category_id']) !!} <br>
                            {!! Form::label('img_path', '画像URL') !!} <br>
                            {!! Form::text('img_path', null, ['id' => 'edit_img_path']) !!} <br>
                            {!! Form::button('登録', ['id' => 'submit_btn', 'type' => 'button', 'class' => 'edit_img_path']) !!}
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
            var edit_modal = document.getElementById('edit_modal');

            for (let i = 0; i < edit_btns.length; i++) {
                edit_btns[i].addEventListener('click', function() {
                    edit_modal.style.display = 'block';

                    let title = document.getElementById(`js_title_${i}`).textContent;
                    let description = document.getElementById(`js_description_${i}`).textContent;
                    let release_datetime = document.getElementById(`js_release_datetime_${i}`).textContent;
                    let category_id =  document.getElementById(`js_category_name_${i}`).dataset.category_id;
                    let img_path = document.getElementById(`js_title_${i}`).textContent;

                    let contents_param = new Map();
                    contents_param.set('title', title);
                    contents_param.set('description', description);
                    contents_param.set('release_datetime', release_datetime);
                    contents_param.set('category_id', category_id);
                    contents_param.set('img_path', img_path);
                    createEditFormByContentsParam(contents_param);
                })
            }
        </script>
    </body>
</html>