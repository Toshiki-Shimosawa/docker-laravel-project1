@extends('Admin.layouts.index')

@section('css')
    <link href="{{ asset('css/admin/user.css') }}" type="text/css" rel="stylesheet">
@endsection

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
                <h1 class="new_form_title">新規登録</h1>

                <!-- Laravelバリデーションのエラー表示 -->
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif

                @inject ( 'dateTimeHelper', 'App\Models\Helper\DateTimeHelper' )

                {!! Form::open(['url' => 'admin/user/new', 'method' => 'post']) !!}
                {!! Form::label('name', 'ユーザー名') !!} <br>
                {!! Form::text('name', null, ['id' => 'name', 'class' => 'name']) !!} <br>
                {!! Form::label('email', 'メールアドレス') !!} <br>
                {!! Form::text('email', null, ['id' => 'email', 'class' => 'email']) !!} <br>
                {!! Form::label('password', 'パスワード') !!} <br>
                {!! Form::text('password', null, ['id' => 'password', 'class' => 'password']) !!} <br>
                {!! Form::button('登録', ['id' => 'new_submit_btn', 'type' => 'button']) !!}
            </div>
        </div>
    </div>
    <div id="edit_modal" class="edit_modal_background">
        <div class="edit_modal-content">
            <div class="edit_modal-body">
                <h1 class="edit_form_title">編集</h1>

                @inject ( 'dateTimeHelper', 'App\Models\Helper\DateTimeHelper' )

                {!! Form::open(['url' => 'admin/user/new', 'method' => 'post']) !!}
                {!! Form::label('name', 'ユーザー名') !!} <br>
                {!! Form::text('name', null, ['id' => 'name', 'class' => 'name']) !!} <br>
                {!! Form::label('email', 'メールアドレス') !!} <br>
                {!! Form::text('email', null, ['id' => 'email', 'class' => 'email']) !!} <br>
                {!! Form::button('登録', ['id' => 'new_submit_btn', 'type' => 'button']) !!}
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('/js/user.js')}}"></script>
@endsection
