<html>
    <head>
        <meta charset=”UTF-8″>
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>管理画面 - KYOTO_BASE</title>
        <link href="{{ asset('css/admin/top.css') }}" type="text/css" rel="stylesheet">
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
        <script src="{{ asset('/js/app.js') }}"></script>
        <script>
            var edit_btns = document.getElementsByClassName('edit_btn');
            var edit_modal = document.getElementById('edit_modal');

            for (let i = 0; i < edit_btns.length; i++) {
                edit_btns[i].addEventListener('click', function() {
                    edit_modal.style.display = 'block';

                    let content_id = document.getElementById(`js_content_id_${i}`).textContent;
                    let title = document.getElementById(`js_title_${i}`).textContent;
                    let description = document.getElementById(`js_description_${i}`).textContent;
                    let release_datetime = document.getElementById(`js_release_datetime_${i}`).textContent;
                    let category_id =  document.getElementById(`js_category_name_${i}`).dataset.category_id;
                    let img_path = document.getElementById(`js_img_path_${i}`).firstElementChild.getAttribute('src');

                    let contents_param = new Map();
                    contents_param.set('content_id', content_id);
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