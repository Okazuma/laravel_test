<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
  <header class="header">
      <div class="header__inner">
        <h1 class="header__logo" href="/">
        FashionablyLate
        </h1>
      </div>
  </header>

  <main>
    <div class="contact__container">
      <div class="contact__heading">
        <h2>Contact</h2>
      </div>
      <div class="form">
        <form class="contact-form" action="/confirm" method="post">
        @csrf


<!-- -----last_name----- -->
          <div class="form">
            <div class="form__group">
              <div class="form__group-title">
                <label class="form__label--item">お名前<span class="form__label--required">※</span></label>
              </div>
              <div class="form__group-content-name">
                <div class="form__input--text-name">
                  <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name')}}"/>
                </div>
                <div class="form__input--text-name">
                  <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name')}}"/>
                </div>
              </div>
            </div>

          <div class="error__container">
            <div class="error__inner">
              <div class="error__item-name">
                <div class="error__item-name__parts">
                  <!--バリデーション-->
                  @error('last_name')
                  {{ $message }}
                  @enderror
                </div>
                <div class="error__item-name__parts">
                  <!--バリデーション-->
                  @error('first_name')
                    {{ $message }}
                  @enderror
                </div>
              </div>
            </div>
          </div>


<!-- -----first_name----- -->
          <div class="form__group">
            <div class="form__group-title">
              <label class="form__label--item">性別</label><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--radio">
                <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} >
                  <span class="input--radio__label">男性</span>
                <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}  />
                  <span class="input--radio__label">女性</span>
                <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} />
                  <span class="input--radio__label">その他</span>
              </div>
            </div>
          </div>
          <div class="error__container">
            <div class="error__inner">
              <div class="error__item">
                <!--バリデーション機能-->
                @error('gender')
                  {{ $message }}
                @enderror
              </div>
            </div>
          </div>

<!-- -----email----- -->
          <div class="form__group">
            <div class="form__group-title">
              <label class="form__label--item">メールアドレス</label><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="email" placeholder="例:test@example.com" value="{{ old('email')}}"/>
              </div>
            </div>
          </div>
          <div class="error__container">
            <div class="error__inner">
              <div class="error__item">
                <!--バリデーション機能-->
                @error('email')
                    {{ $message }}
                @enderror
              </div>
            </div>
          </div>


<!-- -----tel----- -->
          <div class="form__group-tel">
            <div class="form__group-title">
              <label class="form__label--item">電話番号</label><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content-tel">
              <div class="form__input--text-tel">
                <input type="text" name="tel_left" placeholder="o8o" value="{{ old('tel_left')}}"/>
              </div>
                <span class="form__label--tel">-</span>
              <div class="form__input--text-tel">
                <input type="text" name="tel_middle" placeholder="1234" value="{{ old('tel_middle')}}"/>
              </div>
                <span class="form__label--tel">-</span>
              <div class="form__input--text-tel">
                <input type="text" name="tel_right" placeholder="5678" value="{{ old('tel_right')}}"/>
              </div>
            </div>
          </div>
          <div class="error__container">
            <div class="error__inner">
              <div class="error__item">
                <!-- バリデーション機能 -->
                <!-- @error('tel')
                  {{ $message }}
                @enderror -->
              <!-- @error('tel_middle')
                {{ $message }}
              @enderror
              @error('tel_right')
                {{ $message }}
              @enderror -->
              </div>
            </div>
          </div>


<!-- -----address----- -->
          <div class="form__group">
            <div class="form__group-title">
              <label class="form__label--item">住所</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address')}}"/>
              </div>

            </div>
          </div>
          <div class="error__container">
            <div class="error__inner">
              <div class="error__item">
                <!--バリデーション機能-->
                @error('address')
                  {{ $message }}
                @enderror
              </div>
            </div>
          </div>



<!-- -----building----- -->
          <div class="form__group-building">
            <div class="form__group-title">
              <label class="form__label--item">建物名</label>
                <span class="form__label--required-building">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building')}}"/>
              </div>
              <div class="error__item">
                <!--バリデーション機能-->
              </div>
            </div>
          </div>

<!-- -----category_id----- -->
          <div class="form__group">
            <div class="form__group-title">
              <label class="form__label--item">お問い合わせの種類</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <select class="form__input--select" name="category_id">
                <option value="" disable selected>選択してください</option>
                @foreach($categories as $category)
                <option name="category_id" value="{{ $category['id']}}" {{old('category_id') == $category['id'] ?'selected' : '' }} >{{ $category['content']}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="error__container">
            <div class="error__inner">
              <div class="error__item">
                <!--バリデーション機能-->
                @error('category_id')
                  {{ $message }}
                @enderror
              </div>
            </div>
          </div>




<!-- -----detail----- -->
          <div class="form__group">
            <div class="form__group-title">
              <label class="form__label--item">お問い合わせの内容</label>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--textarea">
                <textarea name="detail" cols="50" rows="10" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail')}}</textarea>
              </div>
            </div>
          </div>
          <div class="error__container">
            <div class="error__inner">
              <div class="error__item">
                <!--バリデーション機能-->
                @error('detail')
                  {{ $message }}
                @enderror
              </div>
            </div>
          </div>


<!-- -----button----- -->
          <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>
