@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('title', 'Register')
@section('body_class', 'body-register')

@section('content')
<div class="auth-header">
    <div class="auth-header__logo">
        <h2>Register</h2>
    </div>
</div>

<section class="register">
    <div class="auth-inner">
        <form action="{{ route('register')}}" method="POST" class="auth-form">
        @csrf
            <div class="auth-form__item">
                <label class="auth-form__label">お名前</label>
                <input type="text" name="name" class="auth-form__input" placeholder="例: 山田　太郎" value="{{ old('name') }}">
                @error('name')
                    <p class="auth-form__error">{{ $message }}</p>
                @enderror            
            </div>
            <div class="auth-form__item">
                <label class="auth-form__label">メールアドレス</label>
                <input type="email" name="email" class="auth-form__input" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')
                    <p class="auth-form__error">{{ $message }}</p>
                @enderror            
            </div>
            <div class="auth-form__item">
                <label class="auth-form__label">パスワード</label>
                <input type="password" name="password" class="auth-form__input" placeholder="例: coachtech1106">
                @error('password')
                    <p class="auth-form__error">{{ $message }}</p>
                @enderror                  
            </div>
            <div class="auth-form__button">
                <button type="submit" class="auth-form__button-submit">
                    登録
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
