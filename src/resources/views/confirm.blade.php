@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection
@section('content')

    <div class="contact__container">
        <div class="contact__heading">
            <h2>Confirm</h2>
        </div>

        <form class="form" action="/contacts" method="post">
            @csrf
            <table class="confirm__table">
                <tr class="confirm__table-row">
                    <th class="confirm__table-head">お名前</th>
                        <td class="confirm__table-text">
                            <div class="form__group-content-name">
                                <div class="form__input--text-name">
                                    <input type="text" name="last_name" value="{{ $contact['last_name'] }}"  readonly/>
                                </div>
                            <div class="form__input--text-name">
                                <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly/>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-head">性別</th>
                        <td class="confirm__table-text">
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly/>
                                        <div class="gender">
                                            @if($contact['gender']== '1')
                                            男性
                                            @elseif($contact['gender']== '2')
                                            女性
                                            @elseif($contact['gender']== '3')
                                            その他
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </th>
                <tr class="confirm__table-row">
                    <th class="confirm__table-head">メールアドレス</th>
                        <td class="confirm__table-text">
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="email" name="email" value="{{ $contact['email'] }}" readonly/>
                                </div>
                            </div>
                        </td>
                    </th>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-head">電話番号</th>
                        <td class="confirm__table-text">
                            <div class="form__group-content-tel">
                                <div class="form__input--text">
                                    <input type="tel" name="tel" value="{{ $contact['tel']}}" readonly/>
                                </div>
                            </div>
                        </td>
                    </th>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-head">住所</th>
                        <td class="confirm__table-text">
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="text" name="address" value="{{ $contact['address'] }}" readonly/>
                                </div>
                            </div>
                        </td>
                    </th>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-head">建物名</th>
                        <td class="confirm__table-text">
                            <div class="form__input--text">
                                <input type="text" name="building" value="{{ $contact['building'] }}" readonly/>
                            </div>
                        </td>
                    </th>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-head">お問い合わせの種類</th>
                        <td class="confirm__table-text">
                            <div class="form__input--text">
                                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly/>{{ $category->content }}
                            </div>
                        </td>
                    </th>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-head">お問い合わせの内容</th>
                        <td class="confirm__table-text">
                            <div class="form__input--text">
                                <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly>
                            </div>
                        </td>
                    </th>
                </tr>
            </table>
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信
                </button>
                <form class="form" action="/" method="get">
                    <button class="form__button-edit" type="submit">修正
                    </button>
                </form>
            </div>
        </form>

        <!-- <form class="form" action="/" method="get">
            <button class="form__button-edit" type="submit">修正
            </button>
        </form> -->

    </div>


@endsection
