<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/success.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alike&family=Karma:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Petrona:ital,wght@0,100..900;1,100..900&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo" href="/">
            FashionablyLate
            </h1>
            <!-- <nav>
                <ul class="header-nav">
                    <li class="header-nav__link">
                        <button class="header-nav__button" onclick="location.href='./login'">login</button>
                    </li>
                </ul>
            </nav> -->
        </div>
    </header>
    <main>
        <div class="success__container">
            <div class="success__inner">
                <div class="success__heading">
                    <h2>Success</h2>
                </div>


                <div class="success__content">
                    <form class="success__form" action="/register" method="post">
                    @csrf
                        <div class="success__form-group">
                            <p class="success-text">登録されたメールアドレスへ確認メールを送信しました。<br>添付されたURLへアクセスしログインしてください。
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>