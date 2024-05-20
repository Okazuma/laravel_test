@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')

<div class="register__container">
    <div class="register__inner">
        <div class="register__heading">
            <h2>Register</h2>
        </div>
        <!-- @if (Auth::check())
            
            <li class="header-nav__item">
              <form class="form" action="/login" method="post">
                @csrf
                <button class="header-nav__button">logout</button>
              </form>
            </li>
            @endif -->

        <div class="register__content">
            <form class="register__form" action="/register" method="post">
                @csrf

                <div class="register__form-group">
                    <label class="register__label--item">お名前</label>
                      <div class="register__input--text">
                        <input type="text" name="name" placeholder="例:山田太郎" value="{{ old('name') }}">
                      </div>
                     <div class="form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                     </div>
                </div>


                <div class="register__form-group">
                    <label class="register__label--item">メールアドレス</label>
                    <div class="register__input--text">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                    </div>
                     <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                     </div>
                </div>


                <div class="register__form-group">
                    <label class="register__label--item">パスワード</label>
                    <div class="register__input--text">
                    <input type="password" name="password" placeholder="例:coachtech1106" value="">
                    </div>
                     <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                     </div>
        </div>
                </div>


                <div class="register__button">
                    <button class="register__button-submit" type="submit">登録
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection
