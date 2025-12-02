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
            <input type="text" class="contact-form__item-input contact-form__item-input--name" name="first_name" placeholder="例）山田" value="{{ old('first_name')}}">
            <input type="text" class="contact-form__item-input contact-form__item-input--name" name="last_name" placeholder="例）太郎" value="{{ old('last_name')}}">
        </div>
        @error('first_name')
            <p class="contact-form__error">{{ $message }}</p>
        @enderror
        @error('last_name')
            <p class="contact-form__error">{{ $message }}</p>
        @enderror
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">性別</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <div class="contact-form__item-gender">
                <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>男性
            </div>
            <div class="contact-form__item-gender">
                <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>女性
            </div>
            <div class="contact-form__item-gender">
                <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>その他
            </div>
        </div>
        @error('gender')
            <p class="contact-form__error">{{ $message }}</p>
        @enderror
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">メールアドレス</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="email" class="contact-form__item-input" name="email" placeholder="例）test@example.com" value="{{ old('email')}}">
        </div>
        @error('email')
            <p class="contact-form__error">{{ $message }}</p>
        @enderror

        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">電話番号</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="tel" class="contact-form__item-input contact-form__item-input--tel" name="tel_first" placeholder="080" value="{{ old('tel_first')}}">
                -
            <input type="tel" class="contact-form__item-input contact-form__item-input--tel" name="tel_second" placeholder="1234" value="{{ old('tel_second')}}">
                -
            <input type="tel" class="contact-form__item-input contact-form__item-input--tel" name="tel_third" placeholder="5678" value="{{ old('tel_third')}}">
        </div>
        @error('tel')
            <p class="contact-form__error">{{ $message }}</p>
        @enderror
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">住所</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <input type="text" class="contact-form__item-input" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3"  value="{{ old('address')}}">
        </div>
        @error('address')
            <p class="contact-form__error">{{ $message }}</p>
        @enderror

        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">建物名</span>
            </div>
            <input type="text" class="contact-form__item-input" name="building" placeholder="例）千駄ヶ谷マンション101"  value="{{ old('building')}}">
        </div>
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">お問い合わせの種類</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <select class="contact-form__item-select" name="category_id">
                <option value="" disabled {{ old('category_id') === null ? 'selected' : '' }}>
                    選択してください
                </option>                
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                     {{ $category->content }}
                </option>
                @endforeach
            </select>
        </div>
        @error('category_id')
            <p class="contact-form__error">{{ $message }}</p>
        @enderror
        <div class="contact-form__item">
            <div class="contact-form__item-title">
                <span class="contact-form__label-item">お問い合わせ内容</span>
                <span class="contact-form__label-required">※</span>
            </div>
            <textarea class="contact-form__item-textarea" placeholder="お問い合わせ内容をご記載ください" name="detail">{{ old('detail')}}</textarea>
        </div>
        @error('detail')
            <p class="contact-form__error">{{ $message }}</p>
        @enderror

        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</section>
@endsection