@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section('content')

<div class="admin__container">
  <div class="admin__inner">

    <div class="admin__heading">
        <h2>Admin</h2>
    </div>




<!-- １行目のフォーム群 -->
    <div class="admin__items">
        <div class="admin__items-top">

            <div class="admin-search__text">
                <input type="text" name="" placeholder ="名前やメールアドレスを入力してください" value=""/>
            </div>

            <div class="admin-search__gender">
                <select name="select">
                    <option value="" disable selected>性別</option>
                    <option value="">男性</option>
                    <option value="">女性</option>
                    <option value="">その他</option>
                </select>
            </div>

            <div class="admin-search__contact">
                <select name="select">
                    <option value="" disable selected>お問い合わせの種類</option>
                    <option value="">商品のお届けについて</option>
                    <option value="">商品の交換について</option>
                    <option value="">商品トラブル</option>
                    <option value="">ショップへのお問い合わせ</option>
                    <option value="">その他</option>

                </select>
            </div>


            <div class="admin-search__date">
                <input type="date" name="" value=""/>
            </div>

            <div class="admin-search__button">
                <button class="admin-search__button-search" name="" value="">検索</button>
            </div>
            <div class="admin-search__button">
                <button class="admin-search__button-edit" name="" value="">リセット</button>
            </div>
        </div>





<!-- ２行目のフォーム群 -->
        <div class="admin__items-bottom">
            <div class="admin__items-button">
                <button class="admin__items-button-export" name="" value="">エクスポート</button>
            <div class="admin__item__page-nation" >
            </div>
        </div>


    </div>


<!-- お問い合わせ一覧 -->
    <table class="admin__table">

        <div class="admin__table-group">
            <tr>
                <th class="admin__table-head">お名前</th>
                <th class="admin__table-head">性別</th>
                <th class="admin__table-head">メールアドレス</th>
                <th class="admin__table-head">お問い合わせの種類</th>
                <th class="admin__table-head"></th>

            </tr>
        </div>

        <div class="admin__table-group">
            <tr>
                <td class="admin__table-data">山田太郎</td>
                <td class="admin__table-data">男性</td>
                <td class="admin__table-data">test@example.com</td>
                <td class="admin__table-data">商品の交換について</td>
                <td class="admin__table-data">
                    <a class="modal_open" href="#">詳細</a>
                </td>
            </tr>
        </div>

        <div class="admin__table-group">
            <tr>
                <td class="admin__table-data">山田太郎</td>
                <td class="admin__table-data">男性</td>
                <td class="admin__table-data">test@example.com</td>
                <td class="admin__table-data">商品の交換について</td>
                <td class="admin__table-data">
                    <a class="modal_open" href="#">詳細</a>
                </td>
            </tr>
        </div>
    </table>


  </div>
</div>




@endsection
