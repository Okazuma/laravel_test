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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <script>
    function redirectToLogin() {
        window.location.href = '/login'; // ログインページのURLにリダイレクト
    }
    </script>
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
                    <form class="admin__form-group" action="/search" method="get">

                        <div class="admin-search__text">
                            <input type="text" name="query" placeholder ="名前やメールアドレスを入力してください" value=""/>
                        </div>

                        <div class="admin-search__gender">
                            <select name="gender">
                                <option value="" disable selected>性別</option>
                                <option value="1">男性</option>
                                <option value="2">女性</option>
                                <option value="3">その他</option>
                            </select>
                        </div>


                        <div class="admin-search__contact">
                            <select name="category_id">
                                <option value="" disable selected>お問い合わせの種類</option>
                                @foreach($categories as $category)
                                <option value="{{ $category['id']}}">{{ $category['content']}}
                                </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="admin-search__date">
                            <input type="date" name="date" value=""/>
                        </div>
                        <div class="admin-search__button">
                            <button class="admin-search__button-search" type="submit">検索</button>
                        </div>
                        <div class="admin-search__button">
                            <button class="admin-search__button-edit" type="reset" onclick="redirectToLogin()">リセット</button>
                        </div>
                    </form>


        <!-- ２行目のフォーム群 -->
                    <div class="admin__form__items">
                        <div class="admin__items-button">
                            <button class="admin__items-button-export" id="exportBtn">エクスポート</button>
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
                                @if($contact->gender ==1)
                                                    男性
                                                    @elseif($contact->gender ==2)
                                                    女性
                                                    @elseif($contact->gender ==3)
                                                    その他
                                                    @endif
                            </td>
                            <td class="admin__table-data">{{$contact->email}}</td>
                            <td class="admin__table-data">
                                {{ $contact->category->content }}</td>
                            <td class="admin__table-data">
                                <button class="modal_open-btn btn-info detailBtn"  data-id="{{ $contact->id }}">詳細</button>
                            </td>
                        </tr>
                    </div>
                    @endforeach
                </table>

            </div>
        </div>




        <!-- モーダルウィンドウ -->
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body-inner">
                            <!-- お問い合わせ詳細の内容をここに追加 -->
                            <div class="modal-row-name">
                                <div class="modal-row__heading">
                                    <span class="modal-row__tag">お名前</span>
                                </div>
                                <div class="modal-row__content-name">
                                    <p class="modal-row__item-name" id="contactLastName"></p>
                                    <p class="modal-row__item-name" id="contactFirstName"></p>
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row__heading">
                                    <span class="modal-row__tag">性別</span>
                                </div>
                                <div class="modal-row__content">
                                    <p class="modal-row__item" id="contactGender"></p>
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row__heading">
                                    <span class="modal-row__tag">メールアドレス</span>
                                </div>
                                <div class="modal-row__content">
                                    <p class="modal-row__item" id="contactEmail"></p>
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row__heading">
                                    <span class="modal-row__tag">電話番号</span>
                                </div>
                                <div class="modal-row__content">
                                    <p class="modal-row__item" id="contactTel"></p>
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row__heading">
                                    <span class="modal-row__tag">住所</span>
                                </div>
                                <div class="modal-row__content">
                                    <p class="modal-row__item" id="contactAddress"></p>
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row__heading">
                                    <span class="modal-row__tag">建物名</span>
                                </div>
                                <div class="modal-row__content">
                                    <p class="modal-row__item" id="contactBuilding"></p>
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row__heading">
                                    <span class="modal-row__tag">お問い合わせの種類</span>
                                </div>
                                <div class="modal-row__content">
                                    <p class="modal-row__item" id="contactCategory"></p>
                                </div>
                            </div>
                            <div class="modal-row">
                                <div class="modal-row__heading">
                                    <span class="modal-row__tag">お問い合わせ内容</span>
                                </div>
                                <div class="modal-row__content">
                                    <p class="modal-row__item" id="contactDetail"></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-row__button">
                            <button type="button" class="btn btn-danger deleteBtn">削除</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                $('#contactModal').addClass('modal-hidden');

                // CSRFトークンをAjaxリクエストに含める
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('.detailBtn').click(function() {
                    var contactId = $(this).data('id');

                    $.ajax({
                        url: '/contact/details',
                        type: 'GET',
                        data: { id: contactId },
                        success: function(data) {
                            $('#contactLastName').text(data.last_name);
                            $('#contactFirstName').text(data.first_name);
                            $('#contactEmail').text(data.email);
                            $('#contactTel').text(data.tel);
                            $('#contactAddress').text(data.address);
                            $('#contactBuilding').text(data.building);
                            $('#contactCategory').text(data.category);
                            $('#contactDetail').text(data.detail);

                            var genderText = '';
                            switch(data.gender) {
                                case 1:
                                    genderText = '男性';
                                    break;
                                case 2:
                                    genderText = '女性';
                                    break;
                                case 3:
                                    genderText = 'その他';
                                    break;
                                default:
                                    genderText = '不明';
                            }
                            $('#contactGender').text(genderText);

                            // 削除ボタンにコンタクトIDを設定
                            $('.deleteBtn').data('id', contactId);

                            // モーダルを表示し、モーダルボディの非表示クラスを削除
                            $('#contactModal').modal('show').removeClass('modal-hidden');

                            // 背景要素に外線を追加
                            $('.modal-backdrop').addClass('modal-opened');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                // モーダルが閉じられたときに外線を削除し、モーダルボディを非表示にする
                $('#contactModal').on('hidden.bs.modal', function () {
                    $('.modal-backdrop').removeClass('modal-opened');
                    $('#contactModal').addClass('modal-hidden');
                });

                // 削除ボタンのクリックイベント
                $(document).on('click', '.deleteBtn', function() {
                    var contactId = $(this).data('id');

                    // 削除処理を行うAjaxリクエストを送信
                    $.ajax({
                        url: '/contact/delete',
                        type: 'POST',
                        data: {
                            id: contactId,
                            _token:  '{{ csrf_token() }}'// CSRFトークンを追加
                        },
                        success: function(data) {
                            if (data.status === 'success') {
                                alert(data.message);
                                $('#contactModal').modal('hide');
                                location.reload(); // ページを再読み込みしてリストを更新
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });


                $('#exportBtn').click(function() {
            // エクスポートするデータを取得するAjaxリクエストを送信
            $.ajax({
                url: '/export/data', // エクスポートするデータを取得するエンドポイントのURL
                type: 'GET',
                success: function(data) {
                    var csvData = 'お名前,性別,メールアドレス,お問い合わせの種類\n';
                    data.forEach(function(contact) {
                        var gender = contact.gender;
                        var genderText = '';
                        switch(gender) {
                            case '男性':
                                genderText = '男性';
                                break;
                            case '女性':
                                genderText = '女性';
                                break;
                            case 'その他':
                                genderText = 'その他';
                                break;
                            default:
                                genderText = '不明';
                        }
                        csvData += contact.last_name + contact.first_name + ',' +
                                genderText + ',' +
                                contact.email + ',' +
                                contact.category + '\n';
                    });
                    var blob = new Blob([csvData], { type: 'text/csv' });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'contacts.csv';
                    link.click();
                },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

        </script>
    </main>
</body>

</html>