@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
@endsection

@section('title', 'Login')
@section('body_class', 'body-login')

@section('header_button')
    <a href="{{ route('register') }}" class="header-button__link">register</a>
@endsection

@section('content')
<div class="auth__header">
    <div class="auth__header-logo">
        <h2>Login</h2>
    </div>
</div>

<section class="login">
    <div class="auth-inner">
        <form action="{{ route('login.submit')}}" method="POST" class="auth-form">
        @csrf
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
                    ログイン
                </button>
            </div>
        </form>
    </div>
</section>
@endsection