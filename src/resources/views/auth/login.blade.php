@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('content')


<div class="login__container">
    <div class="login__inner">
        <div class="login__heading">
            <h2>Login</h2>
        </div>

        <!-- @if (Auth::check())
            
            <li class="header-nav__item">
              <form class="form" action="/register" method="post">
                @csrf
                <button class="header-nav__button">logout</button>
              </form>
            </li>
            @endif -->

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



@endsection
