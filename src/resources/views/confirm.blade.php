@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('title', 'Contact')
@section('body_class', 'body-contact')  


@section('content')
<div class="contact__header">
    <div class="contact__header-logo">
        <h2>Confirm</h2>
    </div>
</div>
<section class="contact">
    <form class="confirm-form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__item">{{ $contact['name']}}
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">                        
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__item">{{ $contact['gender_label']}}
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__item">{{ $contact['email']}}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__item">{{ $contact['tel']}}
                        <input type="hidden" name="tel_first" value="{{ $contact['tel_first'] }}">
                        <input type="hidden" name="tel_second" value="{{ $contact['tel_second'] }}">
                        <input type="hidden" name="tel_third" value="{{ $contact['tel_third'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__item">{{ $contact['address']}}
                        <input type="hidden" name="address" value="{{ $contact['address'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__item">{{ $contact['building']}}
                        <input type="hidden" name="building" value="{{ $contact['building'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__item">{{ $contact['category_name']}}
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__item">{!! nl2br(e($contact['detail'])) !!}
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                    </td>
                </tr>
            </table>
            <div class="confirm-form__button">
                <div class="confirm-form__button-send">
                    <button class="confirm-form__button-send-submit" type="submit" name="action" value="send">送信</button>
                </div>
                <div class="confirm-form__button-back">
                    <button class="confirm-form__button-back-submit" type="submit" name="action" value="back">修正</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection