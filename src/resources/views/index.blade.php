@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'Contact')
@section('body_class', 'body-contact')  


@section('content')
<div class="contact__header">
    <div class="contact__header-logo">
        <h2>Contact</h2>
    </div>
</div>
<section class="contact">
    <form class="contact-form__content" action="/confirm" method="post">
        @csrf
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">お名前</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="text" class="contact-form__item-input contact-form__item-input--name" name="first_name" placeholder="例）山田">
            <input type="text" class="contact-form__item-input contact-form__item-input--name" name="last_name" placeholder="例）太郎">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">性別</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <div class="contact-form__item-gender">
                <input type="radio" name="gender" value="1" />男性
            </div>
            <div class="contact-form__item-gender">
                <input type="radio" name="gender" value="2" />女性
            </div>
            <div class="contact-form__item-gender">
                <input type="radio" name="gender" value="3" />その他
            </div>
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">メールアドレス</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="email" class="contact-form__item-input" name="email" placeholder="例）test@example.com">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">電話番号</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="tel" class="contact-form__item-input contact-form__item-input--tel" name="tel_first" placeholder="080">
                -
            <input type="tel" class="contact-form__item-input contact-form__item-input--tel" name="tel_second" placeholder="1234">
                -
            <input type="tel" class="contact-form__item-input contact-form__item-input--tel" name="tel_third" placeholder="5678">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">住所</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="text" class="contact-form__item-input" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">建物名</span>
            </div>
            <input type="text" class="contact-form__item-input" name="building" placeholder="例）千駄ヶ谷マンション101">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">お問い合わせの種類</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <select class="contact-form__item-select" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">お問い合わせ内容</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <textarea class="contact-form__item-textarea" placeholder="お問い合わせ内容をご記載ください" name="detail"></textarea>
        </div>
        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</section>
@endsection