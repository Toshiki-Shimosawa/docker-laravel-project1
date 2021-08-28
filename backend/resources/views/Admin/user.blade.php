@extends('Admin.layouts.index')

@section('contents')
    <div id="new_button" class="new_button">
        <a>新規登録</a>
    </div>
    <div>
        <table class="contents_table">
            <tr>
                <th>コード</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>登録日時</th>
                <th>操作</th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->member_code }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <button>編集</button><br>
                        <button>削除</button><br>
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
