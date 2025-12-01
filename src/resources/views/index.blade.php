@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'Contact')
@section('body_class', 'body-contact')  


@section('content')
<div class="contact__header">
    <h2>Contact</h2>
</div>
<section class="contact">
    <form class="contact-form__content" action="/confirm" method="post">
        @csrf
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label--item">お名前</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="text" class="contact-form__item-input" name="first_name" placeholder="例）山田">
            <input type="text" class="contact-form__item-input" name="last_name" placeholder="例）太郎">
        </div>

        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label--item">性別</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="radio" name="gender" value="man" />男性
            <input type="radio" name="gender" value="woman" />女性
            <input type="radio" name="gender" value="other" />その他
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label--item">メールアドレス</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="email" class="contact-form__item-input" name="email" placeholder="例）test@example.com">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label--item">電話番号</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="tel" class="contact-form__item-input" name="tel_first" placeholder="例）080">
                -
            <input type="tel" class="contact-form__item-input" name="tel_second" placeholder="例）1234">
                -
            <input type="tel" class="contact-form__item-input" name="tel_third" placeholder="例）5678">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label--item">住所</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="text" class="contact-form__item-input" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label--item">建物名</span>
            </div>
            <input type="text" class="contact-form__item-input" name="building" placeholder="例）千駄ヶ谷マンション101">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label--item">お問い合わせの種類</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <select class="contact-form__item-select" name="category_id">
                <option value="">カテゴリ</option>
            </select>
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label--item">お問い合わせ内容</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <textarea name="textarea" class="contact-form__item-textarea" placeholder="お問い合わせ内容をご記載ください" name="content"></textarea>
        </div>
        <button class="contact-form__button submit" type="submit">確認画面</button>
    </form>
</section>
@endsection