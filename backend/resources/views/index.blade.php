<html>
    <head>
        <meta charset=”UTF-8″>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>KYOTO_BASE</title>
        <link href="{{ asset('css/block/navbar.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/top.css') }}" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="fv">
                <h2>キョートベース</h2>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="">ホーム</a></li>
                    <li><a href="">グルメ</a></li>
                    <li><a href="">お店</a></li>
                    <li><a href="">イベント</a></li>
                    <li><a href="">フォト</a></li>
                    <li><a href="">求人</a></li>
                    <li><a href="">不動産</a></li>
                    <li><a href="">話題</a></li>
                    <li><a href="">投稿募集</a></li>
                </ul>
            </div>
            <div id="humburger">
                <span class="inner_line line1" id="line1"></span>
                <span class="inner_line line2" id="line2"></span>
                <span class="inner_line line3" id="line3"></span>
            </div>
            <div id="humburger_menu">
                <ul>
                    <li><a href="">ホーム</a></li>
                    <li><a href="">グルメ</a></li>
                    <li><a href="">お店</a></li>
                    <li><a href="">イベント</a></li>
                    <li><a href="">フォト</a></li>
                    <li><a href="">求人</a></li>
                    <li><a href="">不動産</a></li>
                    <li><a href="">話題</a></li>
                    <li><a href="">投稿募集</a></li>
                </ul>
            </div>
        </header>
        <main>
            <div class="left_contents_pc">
                @foreach ($contents as $content)
                    <section class="card">
                        <img class="card-img" src="{{ $content->getDetailImagePath() }}" alt="">
                        <div class="card-content">
                        <h1 class="card-title">{{ $content->getDetailTitle() }}</h1>
                        <p class="card-text">{{ $content->getDetailDescription() }}</p>
                        </div>
                    </section>
                @endforeach
            </div>
            <div class="right_contents_pc">
                <div class="advertisement">
                    <h2>広告1</h2>
                    <p>内容内容内容内容内容内容内容内容内容内容</p>
                </div>
                <div class="advertisement">
                    <h2>広告2</h2>
                    <p>内容内容内容内容内容内容内容内容内容内容</p>
                </div>
            </div>
            <div class="left_contents_sp">
                @foreach ($contents as $content)
                    <section class="card">
                        <img class="card-img" src="{{ $content->getDetailImagePath() }}" alt="">
                        <div class="card-content">
                        <h1 class="card-title">{{ $content->getDetailTitle() }}</h1>
                        <p class="card-text">{{ $content->getDetailDescription() }}</p>
                        </div>
                    </section>
                @endforeach
            </div>
        </main>
        <footer>
        </footer>
        <script src="{{ asset('/js/top.js') }}"></script>
    </body>
</html>