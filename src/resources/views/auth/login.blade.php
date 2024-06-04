<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
            <nav>
                <ul class="header-nav">
                    <li class="header-nav__link">
                            <button class="header-nav__button" onclick="location.href='./register'">register</button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="login__container">
            <div class="login__inner">
                <div class="login__heading">
                <h2>Login</h2>
                </div>


                <div class="login__content">
                    <form class="login__form" action="/login" method="post">
                        @csrf
                        <div class="login__form-group">
                            <label class="login__label--item">メールアドレス</label>
                            <div class="login__input--text">
                            <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                            </div>
                            <div class="form__error">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="login__form-group">
                            <label class="login__label--item">パスワード</label>
                            <div class="login__input--text">
                            <input type="password" name="password" placeholder="例:coachtech1106" value="">
                            </div>
                            <div class="form__error">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="login__button">
                            <button class="login__button-submit" type="submit">ログイン
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
