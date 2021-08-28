@extends('Admin.layouts.index')

@section('contents')
    <div id="new_button" class="new_button">
        <a>新規投稿</a>
    </div>
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
                    <td id='js_content_id_{{ $key }}'>{{ $content->id }}</td>
                    <td id='js_img_path_{{ $key }}' class='card-img'><img src="{{ $content->getDetailImagePath() }}" alt=""></td>
                    <td id='js_title_{{ $key }}'>{{ $content->getDetailTitle() }}</td>
                    <td>{{ $content->getUserName() }}</td>
                    <td id='js_category_name_{{ $key }}' data-category_id="{{ $content->getDetailCategoryid() }}">{{ $content->getDetailCategoryName() }}</td>
                    <td id='js_description_{{ $key }}'>{{ $content->getDetailDescription() }}</td>
                    <td id='js_release_datetime_{{ $key }}'>{{ $content->release_datetime }}</td>
                    <td>{{ $content->created_at }}</td>
                    <td>{{ $content->updated_at }}</td>
                    <td class="edit_btn">
                        <button class="edit_btn" value="{{ $content->id }}">編集</button>
                    </td>
                </tr>
            @endforeach
        </table>
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
                {!! Form::button('登録', ['id' => 'new_submit_btn', 'type' => 'button', 'class' => 'img_path']) !!}
            </div>
        </div>
    </div>
    <div id="edit_modal" class="edit_modal_background">
        <div class="edit_modal-content">
            <div class="edit_modal-body">
                <h1 class="edit_form_title">編集</h1>

                @inject ( 'dateTimeHelper', 'App\Models\Helper\DateTimeHelper' )

                {!! Form::open(['url' => 'admin/new', 'method' => 'post']) !!}
                {!! Form::hidden('content_id', null, ['id' => 'edit_content_id']) !!}
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
                {!! Form::button('登録', ['id' => 'edit_submit_btn', 'type' => 'button', 'class' => 'edit_img_path']) !!}
            </div>
        </div>
    </div>

@endsection
