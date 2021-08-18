<html>
    <head>
        <meta charset=”UTF-8″>
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
        </header>
        <main>
            <div class="left_contents">
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
            <div class="right_contents">
            </div>

        </main>
        <footer>
        </footer>
    </body>
</html>