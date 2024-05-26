<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alike&family=Karma:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Petrona:ital,wght@0,100..900;1,100..900&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
    svg.w-5.h-5 {
    width: 30px;
    height: 30px;
    }
    </style>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo" href="/">
            FashionablyLate
            </h1>
            <nav>
                <ul class="header-nav">
                @if (Auth::check())
                    <li class="header-nav__item">
                        <form class="form" action="/logout" method="post">
                        @csrf
                            <button class="header-nav__button">logout</button>
                        </form>
                    </li>
                @endif
                </ul>
            </nav>
        </div>
    </header>
    <main>
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
                        </div>
                        <div class="admin__item__page-nation" >
                        {{ $contacts->links('vendor.pagination.tailwind2') }}
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
            @foreach($contacts as $contact)
                    <div class="admin__table-group">
                        <tr class="admin_table-row">
                            <td class="admin__table-data">{{$contact->last_name}}{{$contact->first_name}}</td>
                            <td class="admin__table-data">
                                @if($contact['gender']== '1')
                                                    男性
                                                    @elseif($contact['gender']== '2')
                                                    女性
                                                    @elseif($contact['gender']== '3')
                                                    その他
                                                    @endif
                            </td>
                            <td class="admin__table-data">{{$contact->email}}</td>
                            <td class="admin__table-data">
                                {{ $contact['category_id'] }}</td>
                            <td class="admin__table-data">
                                <a class="modal_open" href="#">詳細</a>
                            </td>
                        </tr>
                    </div>
                    @endforeach
                </table>

            </div>
        </div>
    </main>
</body>

</html>
